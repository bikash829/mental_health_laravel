@extends('layouts.app')

@section('title')
    Services
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Doctor and Counselor</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <section class="specialist segment-margin-side">
        <div class="d-grid gap-2 mb-4"><a href="{{ route('view_appointments') }}" class="btn btn-lg btn-primary">Upcoming
                Appointments</a></div>

        <div class="section-heading">
            <h3 class="section-heading__title">
                Experts And Counselors
            </h3>
        </div>

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <!-- doctor list  -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button accordion-button--custom" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Doctors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-4  g-2 g-lg-3">

                            @foreach ($users as $data)
                            @if ($data->hasRole('Doctor'))
                                <div class="col">
                                    <a class="text-dark text-decoration-none" href="{{route('show_expert_profile', ['id' => $data->id])}}">
                                        <div class="card">
                                            <img src="{{$data->pp_location.'/'.$data->pp_name}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                            <h5 class="card-title">{{$data->expert->doc_title . ' ' . $data->first_name . ' ' . $data->last_name}}</h5>


                                            @foreach ($data->experience as $item )
                                            @if ($item->job_status == 'true')
                                                <h5>Working At</h5>
                                                <h6>{{$item->org_name}} <br> <span class="text-muted">{{$item->position}}</span></h6>
                                                @break
                                            @else
                                                <h5>Worked At</h5>
                                                <h6>{{$item->org_name}} <br> <span class="text-muted">{{$item->position}}</span></h6>
                                                @break

                                            @endif




                                            @endforeach
                                            <h6 class="text-muted">Rating : </h6>
                                            </div>
                                        </div>


                                    </a>
                                </div>
                            @endif
                            @endforeach

                          </div>


                    </div>
                </div>
            </div>
            <!--\\\\\\\\\\\\\\\\\\ councilor list  ////////////////-->
            <div class="accordion-item">
                <h2 class="accordion-header " id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed accordion-button--custom" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Counselors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-4  g-2 g-lg-3">

                            @foreach ($users as $data)
                            @if ($data->hasRole('Counselor') && $data->online == 1)
                                <div class="col">
                                    <a class="text-dark text-decoration-none" href="{{route('show_expert_profile', ['id' => $data->id])}}">
                                        <div class="card">
                                            <img src="{{$data->pp_location.'/'.$data->pp_name}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                            <h5 class="card-title">{{$data->first_name . ' ' . $data->last_name}}</h5>
                                            @foreach ($data->experience as $item )
                                            @if ($item->job_status == 'true')
                                                <h5>Working At</h5>
                                                <h6>{{$item->org_name}} <br> <span class="text-muted">{{$item->position}}</span></h6>
                                                @break
                                            @else
                                                <h5>Worked At</h5>
                                                <h6>{{$item->org_name}} <br> <span class="text-muted">{{$item->position}}</span></h6>
                                                @break

                                            @endif

                                            @endforeach

                                            <h6 class="text-muted">Rating : </h6>
                                            </div>
                                        </div>


                                    </a>
                                </div>
                            @endif
                            @endforeach

                          </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let specialistCardInfo = '';

        let user = '';

        @auth
        // If the user is authenticated, set the user variable with the user's information
        user = {!! json_encode(Auth::user()) !!};
        @endauth

        const specialistCard = $('.specialist__card');

        let baseUrl = "{{ route('patient.show_user_profile', ['user_id' => 'PLACEHOLDER']) }}";
        baseUrl = baseUrl.replace('PLACEHOLDER', '');

        specialistCard.click(e => {
            if (user != '') {
                let specialistId = $(e.currentTarget).find('#user_id').val();

                let url = `${baseUrl}${specialistId}`;
                window.location.href = url;
            } else {
                Swal.fire({
                    title: "Login Required",
                    text: "You need to login to view the specialist's information",
                    icon: "warning"
                });
            }


        });
    </script>
@endsection
