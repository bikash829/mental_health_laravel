@extends('layouts.app')

@section('title') Contact-Us @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Contact Us</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')
    <section class="contact segment-margin">
        <div class="contact__card">
            <!-- <img src="" alt="" class="contact__icon"> -->
            <h2 class="contact__icon"><i class="fa-solid fa-map-location-dot"></i></h2>
            <h3 class="contact__title">Address </h3>
            <p class="contact__info">Dhaka, Dhanmondi</p>
        </div>
        <div class="contact__card">
            <h2 class="contact__icon"><i class="fa-solid fa-phone-volume"></i></h2>
            <h3 class="contact__title">Contact Number </h3>
            <p class="contact__info">0815454444</p>
        </div>
        <div class="contact__card">
            <h2 class="contact__icon"><i class="fa-solid fa-envelope"></i></h2>
            <h3 class="contact__title">E-mail </h3>
            <p class="contact__info">mental.health.support@email.com</p>
        </div>
    </section>

    <!-- contact form  -->
    <section class="contact-frm segment-margin">
        <div class="contact-frm__artcle-con">
            <h2 class="contact-frm__artcle-title">Feel Free To Message Us</h2>
            <p class="contact-frm__artcle">Message us for any information and queries</p>

        </div>
        <div class="contact-form ">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>
                    {{session('status')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif



            <form action="{{route('send_query')}}"  method="POST">
                @csrf
                <div class="contact-form__block c-block">
                    <input class="input c-block__name" type="text" placeholder="First Name" value="{{Auth::user()?->first_name}}" name="first_name" required>

                    <input class="input c-block__name" type="text" placeholder="Last Name" value="{{Auth::user()?->last_name}}" name="last_name" required>
                </div>

                <div class="contact-form__block c-block">
                    <input class="input c-block__email" type="email" value="{{Auth::user()?->email}}" placeholder="Email" name="email" required>

                </div>
                <div class="contact-form__block c-block">
                    <textarea class="input c-block__comment" name="message" required placeholder="Leave Your Comments"></textarea>

                </div>


                <div class="contact-form__block c-block">
                    <input name="btn-contact" type="submit" class="button c-block__button" value="Send">
                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/form_validation.js')}}"></script>

    <script type="text/javascript">

    </script>
@endsection

