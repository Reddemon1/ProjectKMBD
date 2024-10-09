<?php

namespace App\Http\Controllers;

use App\Models\Pending;
use App\Http\Requests\StorePendingRequest;
use App\Http\Requests\UpdatePendingRequest;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(Pending $pending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendingRequest $request, Pending $pending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pending $pending)
    {
        //
    }
}
