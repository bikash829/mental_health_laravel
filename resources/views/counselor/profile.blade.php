@extends('layouts.admin.app')

@section('link')
<x-vendor.bootstrap_css/>
@endsection

@section('content')
<section class="profile segment-margin">
    <div class="col-12 m-auto pb-4">
        <x-admin.progress.account_progress/>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-3 col-lg-3 align-self-center">
            @isset($user->pp_name)
                <img src="{{asset($user->pp_location.'/'.$user->pp_name)}}" class="img-fluid rounded" alt="...">
            @else
                <img src="{{asset('images/profile_pic/blank-profile-picture.png')}}" class="img-fluid rounded" alt="...">
            @endisset
                <p class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#user_profile_image">Upload Photo</a></p>
        </div>



        <div class="accordion" id="accordionPanelsStayOpenExample">

            {{--Basic Information--}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Basic Information
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <form method="POST" id="basicInfo" action="{{--route('patient.edit',['user'=>$user->id])--}}">
                            @csrf
                            {{--                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="text-muted">Full Name: </label>
                                    <span><strong> {{$user?->first_name . ' ' .$user?->last_name }}</strong></span>
                                    {{--                                            <input type="text" value="{{$user->full_name}}" name="name" >--}}
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Date Of Birth: </label>
                                    <span>15-02-1996</span>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Sex: </label>
                                    <span>{{ucfirst($user->gender) }}</span>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">blood group : </label>
                                    <span>{{$user?->bloodGroup?->group}}</span>

                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Religion: </label>
                                    <span>{{ucfirst($user?->religion) }}</span>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Nationality: </label>
                                    <span>Bangladeshi</span>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Language Preference: </label>
                                    <span>English</span>
                                </div>

                            </div>
{{--                            <div class="d-grid pt-2 col-6 mx-auto">--}}
{{--                                --}}{{--                                        <button id="btnBasicInfo" class="btn btn-primary" type="button" >Edit</button>--}}
{{--                                <a href="--}}{{--route('patient.profile.edit',$user->id)--}}{{--" class="btn btn-primary">Edit</a>--}}
{{--                            </div>--}}
                        </form>
                    </div>

                </div>
            </div>

            {{--                    Address Information --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Address
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Address: </label>
                                <span>{{$user?->address?->address}}</span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Address 2: </label>
                                <span>{{$user?->address?->address2}}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">City :</label>
                                <span>{{$user?->address?->city}}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">State: </label>
                                <span>{{$user?->address?->state}}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Zip-Code: </label>
                                <span>{{$user->address?->zip_code}}</span>
                            </div>


                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Country: </label>
                                <span>Bangladesh</span>
                            </div>

                            <div class="col-md-6 col-lg-6">

                            </div>
                        </div>

{{--                        <div class="d-grid pt-2 col-6 mx-auto">--}}
{{--                            <button onclick="window.location.href='{{route('patient.profile.edit',[$user->id,'btn'=>'address'])}}'"   class="btn btn-primary" type="button">Edit</button>--}}
{{--                        </div>--}}


                        <div class="d-grid pt-2 col-6 mx-auto">
                        </div>

                    </div>
                </div>
            </div>

            {{-- contact information --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Contact Info
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Email Address: </label>
                                <span>{{$user->email}}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Mobile: </label>
                                <span>01777099139</span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>




                        </div>
                        <div class="d-grid pt-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="button">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#medicalCondition" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Medical Condition
                    </button>
                </h2>
                <div id="medicalCondition" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                        </div>
                        <div class="d-grid pt-2 g-3 col-6 mx-auto">
                            <button class="btn btn-primary" type="button">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<x-image-upload>
    {{$user->id}}
</x-image-upload>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js')}}"></script>
@endsection