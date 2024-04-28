@extends('layouts.app')

@section('title')
    Mental Health
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Upcoming Appointments</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <!-- ----------service section -----------  -->
    <section class="service segment-margin">

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-4  g-2 g-lg-3">

            @foreach ($doctorSchedule as $data)
            <div class="col">
                <a class="text-dark text-decoration-none" href="{{ route('patient.appointment.set', $data->id) }}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$data->doctor->pp_location.'/'.$data->doctor->pp_name}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$data->doctor->expert->doc_title . ' ' . $data->doctor->first_name . ' ' . $data->doctor->last_name}}</h5>
                          <h6 class="">{{ $data->department->doctor_department }}</h6>
                          <span>Appointment Date</span>
                          <h3 class="">{{ $data->set_date }}</h3>
                           {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                          <p class="">
                            @if ($data->patient_qty > 0)
                                Limit: {{ $data->patient_qty }}
                            @else
                                <span class="text-danger">Appoinment Limit: full</span>
                            @endif
                        </p>
                        </div>
                      </div>


                </a>
            </div>
            @endforeach

          </div>



    </section>
    <!-- -----------end news-------------  -->
@endsection
