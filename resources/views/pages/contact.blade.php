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
            <form action="#" method="POST">
                <div class="contact-form__block c-block">
                    <input class="input c-block__name" type="text" placeholder="First Name" value="{{$user?->first_name}}" name="first_name" required>
                    <input class="input c-block__name" type="text" placeholder="Last Name" value="{{$user?->last_name}}" name="last_name" required>
                </div>

                <div class="contact-form__block c-block">
                    <input class="input c-block__email" type="email" value="{{$user?->email}}" placeholder="Email" name="contact_email" required>
                </div>
                <div class="contact-form__block c-block">
                    <textarea class="input c-block__comment" name="comment" required placeholder="Leave Your Comments"></textarea>
                </div>

                <div class="contact-form__block c-block">
                    <input name="btn-contact" type="submit" class="button c-block__button" value="Send">
                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')@endsection
