@extends('layouts.app')

@section('title')
    {{ __('About Us') }}
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">About Us</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <section class="segment-margin">

        <div class=" my-5">
            <h1 class="text-center mb-4">About Us</h1>

            <!-- Company Overview -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Our Company</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec turpis ligula. Vestibulum nec
                        purus id dolor fermentum hendrerit ac ac justo.</p>
                    <p>Nulla venenatis odio nec ligula aliquam, vitae iaculis justo fermentum. Sed fringilla efficitur est,
                        in lacinia sem pharetra vel.</p>
                </div>
                <div class="col-lg-6">
                    <img src="company-image.jpg" alt="Company Image" class="img-fluid rounded">
                </div>
            </div>

            <!-- Our Team -->
            <div class="row mt-5">
                <div class="col">
                    <h2>Our Team</h2>
                    <p>We are a dedicated team of professionals passionate about creating memorable events. Each member of
                        our team brings unique skills and experience to ensure your event is a success.</p>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="team-member1.jpg" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">John Doe</h5>
                                    <p class="card-text">Event Coordinator</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="team-member2.jpg" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">Jane Smith</h5>
                                    <p class="card-text">Event Planner</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="team-member3.jpg" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">Michael Johnson</h5>
                                    <p class="card-text">Marketing Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission and Vision -->
            <div class="row mt-5">
                <div class="col">
                    <h2>Our Mission</h2>
                    <p>We strive to deliver exceptional event management services that exceed our clients' expectations,
                        creating lasting memories and experiences.</p>
                    <h2 class="mt-4">Our Vision</h2>
                    <p>To be recognized as a leading event management company known for creativity, professionalism, and
                        excellence.</p>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
