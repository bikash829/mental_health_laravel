@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
    {{-- <link rel="stylesheet" href="{{ asset('css/community.css') }}"> --}}
@endsection

@section('content')
    <div class="m-3">
        {{-- <h2>{{Auth::user()->is_verified}}</h2> --}}
        @if (Auth::user()->is_verified == 'verified')
            <div class=" ">

                @if (session('success'))
                    <div class="container alertsuccess">
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @elseif(session('error'))
                    <div class="container alerterror">
                        <div class="alert alert-warning alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif
                <h2 class="text-center text-danger pb-5">Create Service </h2>

                {{-- add department --}}
                {{-- <div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12   rounded py-3 "
                    style="box-sizing: border-box; ">

                    <form action="{{  }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="doctor_department">If don't match your service category enter here and add new
                            </label>
                            <input type="text" name="doctor_department" class="form-control" id=""
                                value="{{ old('doctor_department') }}" placeholder=" Add your service">
                            @error('doctor_department')
                                <p class="text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button class="btn btn-sm btn-success">Add</button>

                        </div>
                    </form>
                </div> --}}

                {{-- <div class="col-12 col-md-1 col-xl-1 col-lg-1"></div> --}}
                <div class=" col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12  bg-gray rounded py-3"
                    style="border: 1px solid #ddd">

                    <form class="row g-3" action="{{ route('service.manage-service.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="category" class="form-label">Select Service Category</label>
                            <select required id="category" name="service_category_id" class="form-select"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-12">
                            <label for="service_name">Service Name</label>
                            <input required type="text" name="service_name"
                                class="form-control @if ($errors->has('service_name')) is-invalid @endif " id="service_name"
                                value="{{ old('service_name') }}" />
                            @if ($errors->has('service_name'))
                                <div class="invalid-feedback">{{ $errors->first('service_name') }}</div>
                            @endif
                        </div>
                        {{-- <div class="col">
                            <label for="description">Service Description</label>
                            <input type="text"  class="form-control @if ($errors->has('description')) is-invalid @endif "
                                id="description" value="{{ old('description') }}" />
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div> --}}

                        <div class="col-12">
                            <label for="description">Service Description</label>

                            <textarea name="description" class="form-control @if ($errors->has('description')) is-invalid @endif " id="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>




                        <div class="col-12">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-lg btn-success">Create Service</button>

                        </div>
                    </form>
                </div>


            </div>
        @else
            <div class="alert alert-danger text-center">
                <h2 class="text-danger">Your account is not verified yet</h2>

                @if (Auth::user()->is_verified == 'pending')
                    <p class="text-danger">Your request is pending for review. Please wait for varification </p>
                @elseif (Auth::user()->is_verified == 'rejected')
                    <p class="text-danger">Your account is rejected</p>
                @elseif (Auth::user()->is_verified == 'unverified')
                    <p class="text-danger">Your account is unverified please complete your profile with valid information
                        and send a account verification request.</p>
                @endif
        @endif

    </div>
@endsection
<x-vendor.bootstrap_js></x-vendor.bootstrap_js>
<script>
    // alert message show hide part js

    setTimeout(function() {
        $('.alertsuccess').slideUp(1000);
    }, 5000);


    setTimeout(function() {
        $('.alerterror').slideUp(1000);
    }, 5000);
</script>
