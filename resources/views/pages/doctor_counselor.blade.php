@extends('layouts.app')

@section('title') Services @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Doctor and Counselor</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')
    <section class="specialist segment-margin-side">
        <div class="d-grid gap-2 mb-4"><a href="./upcomming_appointment.php" class="btn btn-lg btn-primary">Upcomming Appointments</a></div>
        <div class="section-heading">
            <h3 class="section-heading__title">
                Experts And Councilors
            </h3>
        </div>

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <!--\\\\\\\\\\\\\\\\\\ councilor list  ////////////////-->
            <div class="accordion-item">
                <h2 class="accordion-header " id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed accordion-button--custom" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Councilors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="specialist__card-container">
                            <div class="specialist__card">
                                <div class="specialist__img-con">
                                    <img class="specialist__img" src="#" alt="">
                                </div>

                                <div class="specialist__info ">
                                    <input type="hidden" id='user_id' value="{{--<?= $row['id'] ?>--}}">
                                    <div class="person">
                                        <h3 class="person__name">Full Name</h3>
                                        <h3 class="person__occu">Education info</h3>
                                    </div>
                                    <p class="person__description">
                                        Bio
                                    </p>
                                    {% comment %} social links  {% endcomment %}
                                    <div class="specialist__links">
                                        <a href="#" title="click here to visit my facebook wall" class="specialist__icon"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#" title="click to follow twitter" class="specialist__icon"><i class="fa-brands fa-square-twitter"></i></a>
                                        <a href="#" title="click to visit web site" class="specialist__icon"><i class="fa-solid fa-globe"></i></a>
                                        <a href="#" title="click to visit linkdin profile" class="specialist__icon"><i class="fa-brands fa-linkedin"></i></a>
                                    </div>
                                    <div class="text-warning">Rating : 5</div>
                                </div>
                                <button name="btn-councilor" value="" class="specialist_view">View Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- doctor list  -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button accordion-button--custom" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Doctors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="specialist__card-container">
                            <div class="specialist__card">
                                <div class="specialist__img-con">
                                    <img class="specialist__img" src="{{--<?= $pp_location ?>--}}" alt="">
                                </div>

                                <div class="specialist__info ">
                                    <input type="hidden" id='user_id' value="{{--<?= $row['id'] ?>--}}">
                                    <div class="person">
                                        <h3 class="person__name">Dr. Full Name</h3>
                                        <h3 class="person__occu">Education Info</h3>
                                    </div>
                                    <p class="person__description">
                                        BIo
                                    </p>

                                    <div class="specialist__links">
                                        <a href="{{--<?= $social_row['social_link'] ?>--}}" title="click here to visit my facebook wall" class="specialist__icon"><i class="fa-brands fa-facebook"></i></a>

                                        <a href="{{--<?= $social_row['social_link'] ?>--}}" title="click to follow twitter" class="specialist__icon"><i class="fa-brands fa-square-twitter"></i></a>
                                        <a href="{{--<?= $social_row['social_link'] ?>--}}" title="click to visit web site" class="specialist__icon"><i class="fa-solid fa-globe"></i></a>
                                        <a href="{{--<?= $social_row['social_link'] ?>--}}" title="click to visit linkdin profile" class="specialist__icon"><i class="fa-brands fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <button id="specialist_view" class="specialist_view">View Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
