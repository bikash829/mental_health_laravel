@extends('layouts.admin.app')
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

                {{-- <div class="col-12 col-md-1 col-xl-1 col-lg-1"></div> --}}
                <div class="bg-gray card">
                    <h2 class="text-center text-danger card-header">Create Service </h2>
                    <div class="card-body">
                        <form action="{{ route('doctor.serviceStore') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="department_id">Select Your Service Category</label>
                                        <select name="department_id" id="" class="form-control form-select">

                                            <option disabled value="{{ old('department_id') }}" selected>Select Category
                                            </option>


                                            @foreach ($department as $item)
                                                {{-- <option value="{{ $item->id }}">{{ $item->doctor_department }}</option> --}}
                                                <option value="{{ $item->id }}">{{ $item->doctor_department }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="set_date">Select Your Date</label>
                                        <input type="date" name="set_date" class="form-control" id=""
                                            value="{{ old('set_date') }}">
                                        @error('set_date')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <span class="d-block">Select Your Time</span>

                                        <!-- Checked checkbox -->

                                        <div class="checkbox_item pb-3 "
                                            style="display: flex; justify-content: space-around;">
                                            <div class="form-check">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="10-12 PM"
                                                    {{ in_array('10-12 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_1" />
                                                <label class="form-check-label" for="set_time_1"><span
                                                        class="btn border-info btn-sm">10-12 PM</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="12-02 PM"
                                                    {{ in_array('12-02 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_2" />
                                                <label class="form-check-label" for="set_time_2"><span
                                                        class="btn border-info btn-sm">12-02 PM</span></label>
                                            </div>
                                            <div class="form-check ">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="02-04 PM"
                                                    {{ in_array('02-04 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_3" />
                                                <label class="form-check-label" for="set_time_3"><span
                                                        class="btn border-info btn-sm">02-04 PM</span></label>
                                            </div>
                                        </div>
                                        <div class="checkbox_item pb-3 "
                                            style="display: flex; justify-content: space-around;">
                                            <div class="form-check">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="04-06 PM"
                                                    {{ in_array('04-06 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_4" />
                                                <label class="form-check-label" for="set_time_4"><span
                                                        class="btn border-info btn-sm">04-06 PM</span></label>
                                            </div>
                                            <div class="form-check ">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="06-08 PM"
                                                    {{ in_array('06-08 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_6" />
                                                <label class="form-check-label" for="set_time_6"><span
                                                        class="btn border-info btn-sm">06-08 PM</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input name="set_time[]" class="form-check-input" type="checkbox"
                                                    value="08-10 PM"
                                                    {{ in_array('08-10 PM', old('set_time', [])) ? 'checked' : '' }}
                                                    id="set_time_5" />
                                                <label class="form-check-label" for="set_time_5"><span
                                                        class="btn border-info btn-sm">08-10 PM</span></label>
                                            </div>

                                        </div>

                                        <!-- Checked checkbox -->

                                        @error('set_time')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="patient_qty">Venue Capacity</label>
                                        <input type="number" value="{{ old('patient_qty') }}" class="form-control"
                                            name="patient_qty" id="patient_qty"
                                            placeholder="Enter your patient quantity">
                                        @error('patient_qty')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="patient_fee">Price Per Time Slot</label>
                                        <input type="number" class="form-control" value="{{ old('patient_fee') }}"
                                            name="patient_fee" id="patient_fee" placeholder="Charge Per Time Slot">
                                        @error('patient_fee')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="specialist">Location Name</label>
                                        <input type="text" class="form-control" value="{{ old('specialist') }}"
                                            name="specialist" id="specialist" placeholder="Enter address">
                                        @error('specialist')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="meeting_link">Location Map</label>
                                        <input type="text" class="form-control" value="{{ old('meeting_link') }}"
                                            name="meeting_link" id="meeting_link" placeholder="Enter your Meeting link ">
                                        @error('meeting_link')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="gallery">Gallery(Optional)</label>
                                        <input type="file" class="form-control" value="{{ old('gallery') }}"
                                            name="gallery" id="gallery">
                                        @error('gallery')
                                            <p class="text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group ">
                                        <label for="description">Short Description(Optional)</label>
                                        <textarea name="description" class="form-control" id="description" cols="10" rows="4"
                                            placeholder="Enter your short description">{{ old('description') }}</textarea>

                                    </div>
                                </div>

                            </div>

                            <div class="">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button class="btn btn-lg btn-success">Submit Your Schedule</button>

                            </div>
                        </form>
                    </div>

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

<script>
    // alert message show hide part js

    setTimeout(function() {
        $('.alertsuccess').slideUp(1000);
    }, 5000);


    setTimeout(function() {
        $('.alerterror').slideUp(1000);
    }, 5000);
</script>
