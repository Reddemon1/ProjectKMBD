<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Http\Requests\StoreProductionRequest;
use App\Http\Requests\UpdateProductionRequest;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Production::all();
        return view("admin/production/allproduction", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/production/addproduction");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductionRequest $request)
    {
        $validated = $request->validated();
        Production::create($validated);

        return redirect(route('all-productions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $production = Production::find($id);
        return view('admin.production.editproduction', compact('production'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductionRequest $request, $id)
    {
        $production = Production::find($id);
        $validated = $request->validated();

        $production->update($validated);
        return redirect(route('all-productions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Production::findOrFail($id);
        $data->delete();

        return redirect(route('all-productions'));
    }
}
