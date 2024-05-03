<?php

namespace App\Http\Controllers;


use App\Models\DoctorAppointment;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;
use Session;

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

    function bookServicePayment(Request $request)
    {

        $userId = Auth::user()->id;

        $request->validate(
            [
                'time' => [
                    'required',
                    Rule::unique('doctor_appointments')->where(function ($query) use ($userId, $request) {
                        return $query->where('patient_id', $userId)
                            ->where('appointment_date', $request->appointment_date)
                            ->where('time', $request->time);
                    }),
                ],
                'age' => [
                    'required',
                    'integer',
                    'max:100',
                    'min:1',
                ],
                'email' => 'required|email',
                'address' => 'required',
                'patient_name' => 'required',
                'phone' => 'required|numeric|digits:11',

            ],
            [
                'time.required' => 'Time select is required',
                'age.required' => 'Age is required',
                'email.required' => 'Age is required',
                'address.required' => 'Address is required',
                'patient_name.required' => 'Name is required',
                'phone.required' => 'Phone Name is required',

            ]
        );
        $appointmentId = DoctorAppointment::insertGetId([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'doctor_schedule_id' => $request->doctor_schedule_id,
            'department' => $request->department,
            'appointment_date' => $request->appointment_date,
            'time' => $request->time,
            'fee' => $request->fee,
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'patient_problem' => $request->patient_problem,
            'description' => $request->description,
        ]);

        if ($appointmentId) {
            Session::put('appointmentId', $appointmentId);
            // dd('here you are');


            return redirect()->route('booking.service.paymentMethod')->with('success', 'Booking Data Saved and now please pay your payment');
            // return redirect()->route('booking.service.paymentMethod')->with('success', 'Booking Data Saved and now please pay your payment');
            // return redirect('patient/doctor/appoinment/payment')->with('success', 'Booking Data Saved and now please pay your payment');

        } else {
            return redirect()->back()->with('error', 'Opps! Your Appointment Not saved, please try again');

        }
    }


    function paymentMethod()
    {
        // dd('here you are');
        $data = DoctorAppointment::findOrFail(Session::get('appointmentId'));

        // return view('patient.appoinmentPayment', compact('data'));
        return view('pages.booking.payment_method', compact('data'));

    }


    // finalizing the payment
    function confirmingOrderForPayment(Request $request, $id)
    {

        $request->validate(
            [
                'payment_method' => 'required',
                'tarms_checbox' => 'required',

            ],
            [
                'payment_method.required' => 'Select your payment method',
                'tarms_checbox.required' => 'Tranm\' and condition is required',

            ]
        );

        $data = DoctorAppointment::findOrFail($id);
        $paymentMethod = $request->payment_method;
        $scheduleId = $request->scheduleId;


        if ($paymentMethod == 'cash') {
            $data->payment_status = 'Cash On';
            $data->status = 1;
            $data->payment_method = $paymentMethod;
            $savedata = $data->update();
            if ($savedata) {
                $schedule = DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty = ($schedule->patient_qty - 1);
                $schedule->update();

            }

            return view('pages.booking.confirming_order');
        } elseif ($paymentMethod == 'bkash') {
            $data->payment_status = 'Paid';
            $data->status = 1;
            $data->payment_method = $paymentMethod;
            $savedata = $data->update();
            if ($savedata) {
                $schedule = DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty = ($schedule->patient_qty - 1);
                $schedule->update();

            }

            return view('pages/booking/payment_success');
        } elseif ($paymentMethod == 'nagod') {
            $data->payment_status = 'Paid';
            $data->status = 1;
            $data->payment_method = $paymentMethod;
            $savedata = $data->update();
            if ($savedata) {
                $schedule = DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty = ($schedule->patient_qty - 1);
                $schedule->update();

            }
            return view('pages/booking/payment_success');
        } elseif ($paymentMethod == 'roket') {
            $data->payment_status = 'Paid';
            $data->status = 1;
            $data->payment_method = $paymentMethod;
            $savedata = $data->update();
            if ($savedata) {
                $schedule = DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty = ($schedule->patient_qty - 1);
                $schedule->update();

            }
            return view('pages/booking/payment_success');
        }


    }
    // function servicePaymentMethod()
    // {

    //     $data = DoctorAppointment::findOrFail(Session::get('appointmentId'));

    //     // return view('patient.appoinmentPayment', compact('data'));
    //     return view('pages.booking.payment_method', compact('data'));

    // }
}
