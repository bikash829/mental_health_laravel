@extends('layouts.admin.app')

{{-- @section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@endsection --}}

@section('link')
    <x-vendor.bootstrap_css />
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.5/r-3.0.2/datatables.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/community.css') }}"> --}}
@endsection
@section('content')
    <div class="container px-4">
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

            <div class="card">
                <h2 class="card-header">Manage Services</h2>
                <div class="card-body">
                    @if (count($services) > 0)
                        @php
                            $sl = 1;
                        @endphp
                        <table id="serviceList" class="table table-bordered dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Schedule Date</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                    <th>Max Capacity</th>
                                    <th>Cost Per Time</th>
                                    <th>Adress</th>
                                    <th>Map Link</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $data)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $data->set_date }}</td>
                                        <td>{{ $data->department->doctor_department }}</td>
                                        <td>
                                            @foreach (explode('|', $data->set_time) as $tdata)
                                                <span class="btn border-info btn-sm ">{{ $tdata }}</span>
                                            @endforeach

                                        </td>
                                        <td>{{ $data->patient_qty }}</td>
                                        <td>{{ $data->patient_fee }}</td>
                                        <td>{{ $data->specialist }}</td>
                                        <td>{{ $data->meeting_link }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            @if ($data->status == 1)
                                                <a href="{{ route('doctor.serviceStatus', $data->id) }}"
                                                    class="badge badge-success badge-shadow"
                                                    style="text-decoration: none;">Active</a>
                                            @else
                                                <a href="{{ route('doctor.serviceStatus', $data->id) }}"
                                                    class="badge badge-danger badge-shadow"
                                                    style="text-decoration: none;">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('doctor.schedule.delete', $data->id) }}"
                                                class="btn btn-sm btn-danger text-white "><i class="fa fa-trash"></i></a> --}}
                                            <a href="{{ route('doctor.serviceEdit', $data->id) }}"
                                                class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i> Edit
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Schedule Date</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                    <th>Max Capacity</th>
                                    <th>Cost Per Time</th>
                                    <th>Adress</th>
                                    <th>Map Link</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <h3>No Schedule Set</h3>
                    @endif

                </div>
            </div>


        </div>
    </div>



@endsection

<script>
    // alert message show hide part js 

    setTimeout(function() {
        $('.alertsuccess').slideUp(1000);
    }, 5000);


    setTimeout(function() {
        $('.alerterror').slideUp(1000);
    }, 5000);
</script>
@section('scripts')
    <x-vendor.bootstrap_js></x-vendor.bootstrap_js>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.5/r-3.0.2/datatables.min.js"></script>
    <script>
        $('#serviceList').DataTable({
            responsive: true
        });
    </script>
@endsection
