@extends('layouts.app')

@section('title')
    Event Mastering
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Service List</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Service List') }}">
    </div>
@endsection


@section('content')
    <!-- ------------- our services --------------- -->

    <section class="specialist segment-margin">
        <div class="section-heading">
            <h3 class="section-heading__title">
                Our Service and Packages
            </h3>

        </div>


        <div class="specialist__card-container">
            @foreach ($vendorSchedules as $data)
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $data->department->doctor_department }}</h5>
                        <p class="">{{ date('j F Y', strtotime($data->set_date)) }}</p>
                        <p class="text-muted">{{ $data->specialist }}</p>
                        <p class="card-text">{{ $data->description }}</p>
                        <h3 class="text-muted">Price: {{ $data->patient_fee }}</h3>
                        <a href="{{ route('booking.service.bookService', $data) }}" class="btn btn-secondary">Book
                            Service</a>
                    </div>
                </div>
            @endforeach

        </div>


    </section>

    <!-- -----------end news-------------  -->
@endsection
