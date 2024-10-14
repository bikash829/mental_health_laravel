@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.5/r-3.0.2/datatables.min.css" rel="stylesheet">
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
                <h2 class="text-center text-danger pb-5">Service List </h2>


                {{-- <div class="col-12 col-md-1 col-xl-1 col-lg-1"></div> --}}
                <table id="serviceList" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Service Name</th>
                            <th>Category</th>
                            <th>Is Available</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ dd($service->category->category_name) }}</td>
                                <td>61</td>
                                <td>2011-04-25</td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Service Name</th>
                            <th>Category</th>
                            <th>Is Available</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                </table>

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
@section('scripts')
    <x-vendor.bootstrap_js></x-vendor.bootstrap_js>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.5/r-3.0.2/datatables.min.js"></script>
    <script>
        $('#serviceList').DataTable({
            responsive: true
        });
    </script>
@endsection
