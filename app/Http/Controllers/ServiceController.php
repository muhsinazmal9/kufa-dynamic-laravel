<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['services'] = Service::latest()->paginate(10);
        return view('backend.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['fonts'] = json_decode(file_get_contents(public_path('fontawesome-6.json')))->fonts;
        return view('backend.services.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required|max:255',
        ], [
            'icon' => 'The service icon is required!'
        ]);

        Service::create($request->except('_token'));

        return redirect()->route('services.index')->withToastSuccess('The service created successfully');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $data['service'] = $service;
        $data['fonts'] = json_decode(file_get_contents(public_path('fontawesome-6.json')))->fonts;
        return view('backend.services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required|max:255',
        ], [
            'icon' => 'The service icon is required!'
        ]);

        $service->update($request->except('_token', '_method'));

        return redirect()->route('services.index')->withToastSuccess('Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
