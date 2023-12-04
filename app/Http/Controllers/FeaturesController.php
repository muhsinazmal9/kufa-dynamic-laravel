<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.features.indexCreate');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // skip for simplicity
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Features $features)
    {
        return view('backend.features.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Features $features)
    {
        return view('backend.features.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Features $features)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Features $features)
    {
        //
    }
}
