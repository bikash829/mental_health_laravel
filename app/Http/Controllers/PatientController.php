<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //
//    private $user;
//
//    public function __construct()
//    {
//        // Initialize the property in the constructor if needed
//        $this->user = Auth::user();
//    }


    public function show_profile(){
        $user = Auth::user();
        return view('patient.profile',compact('user'));
    }

    //editing
    public function edit_address(){
        $user = Auth::user();
        return view('patient.edit_address',compact('user'));
    }

    public function edit_basic_info(){
        $user = Auth::user();
        $blood_groups = BloodGroup::all();
        return view('patient.edit_basic_info',compact('user','blood_groups'));
    }

   public function edit_contact(){
       $user = Auth::user();
       return view('patient.edit_contact',compact('user'));
   }
//
//    public function edit_medical_info(){
//        $user = Auth::user();
//        return view('patient.edit_medical_info',compact('user'));
//    }
}
