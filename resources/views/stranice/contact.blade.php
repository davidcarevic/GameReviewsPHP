@extends('layouts.layout')

@section('page-top')
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/{{rand(1,4)}}.jpg">
        <div class="page-info">
            <h2>Contact</h2>
            <div class="site-breadcrumb">
                <a href="{{asset('/')}}">Home</a>  /
                <span>Contact</span>
            </div>
        </div>
    </section>
@endsection



@section('sadrzaj')
<!-- Contact page -->
<section class="contact-page">
    <div class="container">
        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
        <div class="row">
            <div class="col-lg-7 order-2 order-lg-1">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="contact-form" method="post" action="{{url('/contact')}}">
                    @CSRF

                    <input type="text" name="email" placeholder="Your e-mail">
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="message" placeholder="Message"></textarea>
                    <button type="submit" name="btnEmail" class="site-btn">Send message<img src="img/icons/double-arrow.png" alt="#"/></button>
                </form>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                <h3>Howdy! Say hello</h3>
                <p>Having an issue? Want to recover your account? Or you just want to say hello? Send us an email!</p>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/location.png" alt=""></div>
                    <div class="ci-text">Main Str, no 23, New York</div>
                </div>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/phone.png" alt=""></div>
                    <div class="ci-text">+546 990221 123</div>
                </div>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/mail.png" alt=""></div>
                    <div class="ci-text">david.carevic.159.14@ict.edu.rs/div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact page end-->
    @endsection
