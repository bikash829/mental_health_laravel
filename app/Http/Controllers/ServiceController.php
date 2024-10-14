<?php

namespace App\Http\Controllers;

use App\Models\Events\Service;
use App\Models\Events\ServiceCategory;
use App\Models\TrainingInfo;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::find(1);
        $categories = ServiceCategory::find(1);
        dd($categories);


        dd($services->category);
        foreach ($services as $value) {

            dd($value);
        }
        return view('admin.manage_service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = ServiceCategory::all();
        return view('admin.manage_service/create_service', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|unique:services|max:100',
            'description' => 'required|string',
            'user_id' => 'required',
            'service_category_id' => 'required',

        ]);

        $service = Service::create($request->all());
        return redirect()->route('service.manage-service.index')->with('success', "Service $request->service_name has been created");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
