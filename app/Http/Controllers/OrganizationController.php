<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Organization::first();
        return view("admin/about", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request)
    {
        $partner = Organization::first();
        $validated = $request->validated();

        // dd($validated);
        if($request->structure != NULL){
            Storage::delete($partner->structure);
            $filePath = $request->file('structure')->store('about-us', 'public');
            $validated['structure'] = "storage/" . $filePath;
        }
        if($request->logo != NULL){
            Storage::delete($partner->logo);
            $filePath = $request->file('logo')->store('about-us', 'public');
            $validated['logo'] = "storage/" . $filePath;
        }
        $partner->update($validated);
        return redirect(route('about-us'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
