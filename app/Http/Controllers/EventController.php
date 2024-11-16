<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Pending;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Event::with('user');
        if(Auth::user()->role == 'aktivis'){
            $datas = $datas->where('user_id','=',Auth::id())->get();
        }else{
            $datas = $datas->get();
        }
        return view("admin/event/allevent
        ", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/event/addevent");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $filePath = $request->file('image')->store('events', 'public');

        $validated['image'] = "storage/" . $filePath;
        if(Auth::user()->role == 'admin'){
            Event::create($validated);
            return redirect(route('all-events'));
        }else if(Auth::user()->role == 'aktivis'){
            Pending::create($validated);
            return redirect(route('pending-event-req'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Event::with('user')->find($id);
        return view('eventdetail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $user_name = User::find($event->user_id);
        return view('admin.event.editevent', compact(['event','user_name']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::find($id);
        $validated = $request->validated();
        $request['user_id'] = $event->user_id;
        if($request->image != NULL){
            Storage::delete($event->image);
            $filePath = $request->file('image')->store('events', 'public');
            $validated['image'] = "storage/" . $filePath;
        }

        $event->update($validated);
        return redirect(route('all-events'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        // echo asset($data->image);
        Storage::delete($data->image);
        $data->delete();

        return redirect()->back();
    }
}
