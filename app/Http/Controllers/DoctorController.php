<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // doctor profile section
    public function show_dashboard(){
        $user = Auth::user();
        return view('doctor.dashboard',compact('user'));
    }

    public function show_profile(){
        $user = Auth::user();
        return view('doctor.profile',compact('user'));
    }

    public function doctor_profile_wizard_step(){
        $user = Auth::user();
        $country_phone = json_decode(file_get_contents(public_path('data/countries.json')),true);
        // dd($country_phone);

        return view('wizard_step_form.doctor_form',compact('user','country_phone'));
    }
}
