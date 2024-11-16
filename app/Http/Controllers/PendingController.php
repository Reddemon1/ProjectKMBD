<?php

namespace App\Http\Controllers;

use App\Models\Pending;
use App\Http\Requests\StorePendingRequest;
use App\Http\Requests\UpdatePendingRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Request;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Pending::with('user');
        if (Auth::user()->role == 'aktivis') {
            $datas = $datas->where('user_id', '=', Auth::id())->orderBy('status','desc')->get();
        } else {
            $datas = $datas->orderBy('status','desc')->get();
        }
        return view("admin/event/pending
        ", compact('datas'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'in:pending,revision,rejected,accepted'
        ]);
        $data = Pending::find($id);
        $data->status = $validated['status'];
        $data->save();

        if ($validated['status'] == 'accepted') {
            $newEvent = [
                'title' => $data->title,
                'image' => $data->image,
                'description' => $data->description,
                'date' => $data->date,
                'registration_link' => $data->registration_link,
                'user_id'=> $data->user_id
            ];
            Event::create($newEvent);
        }
        return redirect()->back();
    }
    public function updateMessage(Request $request, $id)
    {
        $data = Pending::find($id);
        $data->message = $request->message;
        $data->save();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pending $pending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Pending::find($id);
        $user_name = User::find($event->user_id);
        return view('admin.pending-event.editevent', compact(['event','user_name']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendingRequest $request, $id)
    {
        $event = Pending::find($id);
        $validated = $request->validated();
        $request['user_id'] = $event->user_id;
        if($request->image != NULL){
            Storage::delete($event->image);
            $filePath = $request->file('image')->store('events', 'public');
            $validated['image'] = "storage/" . $filePath;
        }

        $event->update($validated);
        return redirect(route('pending-event-req'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pending::findOrFail($id);
        // echo asset($data->image);
        // echo
        Storage::delete($data->image);
        $data->delete();

        // return redirect()->back();
    }
}
