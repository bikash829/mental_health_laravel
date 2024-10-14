@extends('layouts.app')

@section('title')
    Event Mastering
@endsection

@section('banner')
    <div class="hero-container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('images/banner/slider1.avif') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Serving is an art of the profession</h5>
                        <p class="text-white">Hire best service provider</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('images/banner/slider2.jpg') }} " class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Taste our food</h5>
                        <p>We provide best food maker</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner/slider3.avif') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Music is love</h5>
                        <p class="text-white">Music Touches our soul</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection


@section('content')
    <!-- ----------service section -----------  -->
    <section class="service segment-margin">
        <!-- service card  -->
        <div class="service__card-container ">
            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{ asset('images/divpics/doctor.jpg') }}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Hire Musical Instrument </h3>
                <p class="s-card__para">Need to organize music event? hire our service from home</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{ asset('images/divpics/counselor.webp') }}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Taste the best cheefs experience</h3>
                <p class="s-card__para">Need a best cheef for you? Don't worry we're available for you 24/7</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{ asset('images/divpics/comfortable.jpg') }}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Suitable Venue</h3>
                <p class="s-card__para">There's no shame in getting help. We're here to welcome you anytime</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{ asset('images/divpics/safe.jpg') }}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Decorate Your Place</h3>
                <p class="s-card__para">Decorate your place as like as you want we are always ready for you</p>
            </div>


        </div>

        <!-- service welcome  -->
        <div class="service__welcome welcome">
            <div class="welcome__banner-container">
                <img class="welcome__banner" src="{{ asset('images/img/service__baner.jpg') }}" alt="Loading">
            </div>

            <div class="welcome__article">
                <h2 class="welcome__header">Welcome To Our Vicinity</h2>
                <div class="welcome__para-container">
                    <p class="welcome__para">
                        We welcome you to join us anytime. We're here to help whenever you need.
                    </p>
                    <p class="welcome__para">
                        We provide the best and reliable service for you. By using our service you can make your event
                        simply.
                    </p>
                </div>

                <!-- <button class="welcome__button button button-large">Learn More</button> -->
            </div>
        </div>
    </section>
    <!-- ---------------service end ----------- -->


    <!-- -------------our specialist--------------- -->
    <section class="specialist segment-margin">
        <div class="section-heading">
            <h3 class="section-heading__title">
                Our Services
            </h3>
            <p class="section-heading__para">
                Book a event and Meet Our beautiful services
            </p>
        </div>


        <div class="specialist__card-container">
            @foreach ($doctorSchedule as $data)
                <div class="specialist__card" style="max-width:20rem;">


                    <a href="{{ route('patient.appointment.set', $data->id) }}" style="text-decoration: none;">
                        <div class="specialist__info ">
                            <div class="person">
                                <h3 class="person__name">{{ $data->set_date }}</h3>
                                <h3 class="person__occu">{{ $data->department->doctor_department }}</h3>
                            </div>
                            <p class="person__description">
                                {{ $data->specialist }}
                            </p>
                            <p class="person__description">
                                @if ($data->patient_qty > 0)
                                    Limit: {{ $data->patient_qty }}
                                @else
                                    <span class="text-danger">Appoinment Limit: full</span>
                                @endif
                            </p>

                            <div class="specialist__links">
                                <a href="#" title="click here to visit my facebook wall"
                                    class="specialist__icon"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" title="click to follow twitter" class="specialist__icon"><i
                                        class="fa-brands fa-twitter"></i></a>
                                <a href="#" title="click to visit web site" class="specialist__icon"><i
                                        class="fa-solid fa-globe"></i></a>
                                <a href="#" title="click to visit linkdin profile" class="specialist__icon"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </a>



                </div>
            @endforeach

        </div>


    </section>
    <!-- ------------our specialist end------------ -->
    <!-- ------------emmergency hotline----------- -->
    <section class="emmergency segment-margin">
        <div class="emmergency__content">
            <h2 class="section-heading__title">Emmergency Hotline</h2>
            <h2 class="emmergency__contact">+8801725485465</h2>
            <p class="section-heading__para section-heading__para--emmergency-font">We provide 24/7 customer support.
                Please feel free to contact us
                for emergency case.</p>
        </div>

    </section>
    <!-- ------------end emmergency hotline-------------- -->

    <!-- ----------recent news ------------  -->
    <section class="news segment-margin">
        <div class="news__heading section-heading">
            <h2 class="section-heading__title">Recent event's news</h2>
            <p class="section-heading__para">
                Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link
                available in the service for subdue fruit.
            </p>
        </div>

        <div class="news__card-container">
            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{ asset('images/recent-news/bg1.jpg') }}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per
                        person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i
                            class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{ asset('images/recent-news/bg2.jpg') }}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per
                        person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i
                            class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{ asset('images/recent-news/bg3.jpg') }}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per
                        person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i
                            class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{ asset('images/recent-news/bg4.jpg') }}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per
                        person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i
                            class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------end news-------------  -->
@endsection
