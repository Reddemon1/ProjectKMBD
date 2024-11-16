<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Partner::all();
        return view("admin/partner/allpartner", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/partner/addpartner");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $validated = $request->validated();
        // dd($request->file('image')); // Debugging the uploaded file

        $filePath = $request->file('image')->store('partners', 'public');

        $validated['image'] = "storage/" . $filePath;

        // dd($validated);
        Partner::create($validated);

        return redirect(route('all-partners'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partner.editpartner', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, $id)
    {
        $partner = Partner::find($id);
        $validated = $request->validated();

        // dd($validated);
        if($request->image != NULL){
            Storage::delete($partner->image);
            $filePath = $request->file('image')->store('partners', 'public');
            $validated['image'] = "storage/" . $filePath;
        }

        $partner->update($validated);
        return redirect(route('all-partners'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Partner::findOrFail($id);
        // echo asset($data->image);
        
        Storage::delete($data->image);
        $data->delete();

        return redirect(route('all-partners'));
    }
}
