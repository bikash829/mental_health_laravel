<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\User;


class AdminController extends Controller
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

    public function show_dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    public function show_profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }


    // show_contact_us
    public function show_contact_us()
    {
        $user = Auth::user();
        $contact_us = ContactUs::all();
        return view('admin.contact_us_queries', compact('contact_us', 'user'));
    }


    // show_pending_user
    public function show_pending_user()
    {
        $user = Auth::user();

        $users = User::role(['Doctor', 'Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',2)
        ->get();
        return view('admin.pending_user', compact('users','user'));
    }


    // show_blocked_user
    public function show_blocked_user()
    {
        $user = Auth::user();

        $users = User::role(['Doctor', 'Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_active',0)
        ->get();
        return view('admin.blocked_user', compact('users','user'));
    }


    // show_doctor_list
    public function show_doctor_list()
    {
        $user = Auth::user();

        $users = User::role(['Doctor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.doctor_list', compact('users','user'));
    }


    // show_counselor_list
    public function show_counselor_list()
    {
        $user = Auth::user();

        $users = User::role(['Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.counselor_list', compact('users','user'));
    }

    // show_patient_list
    public function show_patient_list()
    {
        $user = Auth::user();

        $users = User::role(['Patient']) // Only get users with Patient role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.patient_list', compact('users','user'));
    }

    // show_all_users
    public function show_all_users()
    {
        $user = Auth::user();

        $users = User::role(['Patient','Doctor','Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.all_users', compact('users','user'));
    }


    // verify_user
    public function verify_user(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_verified = 1;
        $user->save();
        return redirect()->back()->with('success', 'User Verified Successfully');
    }

    // block_user
    public function block_user(Request $request)
    {

        // dd($request);
        $user = User::find($request->id);
        $user->is_active = 0;
        $user->save();
        return redirect()->back()->with('success', 'User Blocked Successfully');
    }


}
