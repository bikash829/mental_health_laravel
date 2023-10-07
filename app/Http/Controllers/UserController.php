<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        if(Auth::user()->hasRole('Patient')){
            return  view('patient.profile',compact('user'));
        }elseif(Auth::user()->hasRole('Doctor')){
            return view('doctor.dashboard',compact('user'));
        }elseif(Auth::user()->hasRole('Counselor')){
            return view('counselor.dashboard',compact('user'));
        }elseif (Auth::user()->hasRole('Admin')){
            return view('admin.dashboard',compact('user'));
        }else{
            return redirect()->route('error404');
        }
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());
//        return back()->with('success','blah blah ');
        return redirect(route('patient.profile.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function delete(User $user)
    {
        //
    }
}
