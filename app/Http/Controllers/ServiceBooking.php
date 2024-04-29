<?php

namespace App\Http\Controllers;



use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Auth;

class ServiceBooking extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $user = Auth::user()->hasRole('vendor');

        // dd($user);

        return 'hello index';
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
        return 'hello store';
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorSchedule $doctorSchedule, $id)
    {
        //
        $vendorSchedules = $doctorSchedule->where('user_id', $id)->get();

        return view('pages.booking.service_list', compact('vendorSchedules'));



    }
    public function bookService(DoctorSchedule $doctorSchedule, $service_id)
    {

        $doctorSchedule = $doctorSchedule->where('id', $service_id)->first();



        return view('pages.booking.booking_service', compact('doctorSchedule'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        //
        return 'hello edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        //
        return 'hello update';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        //
        return 'hello destory';
    }

    //  appointment set
    // function appointmentSet(DoctorSchedule $id){
    //     $doctorSchedule = DoctorSchedule::findOrFail($id);




    //     return view('patient.appointmentSet',compact('doctorSchedule'));

    // }
}
