@extends('layouts.layout')
@section('page-top')
    <section class="page-top-section set-bg" data-setbg="{{asset('/')}}img/page-top-bg/{{rand(1,4)}}.jpg">
        <div class="page-info">
            <h2>Login</h2>
            <div class="site-breadcrumb">
                <a href="{{asset('/')}}">Home</a>  /
                <span>Login</span>
            </div>
        </div>
    </section>

@endsection

@section('sadrzaj')
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1">
                    <form class="contact-form" method="post" action="{{url('/login')}}">
                        @CSRF

                        <input type="text" name="email" placeholder="Your e-mail">
                        <input type="password" name="password" placeholder="Password">

                        <button type="submit" name="btnLogin" class="site-btn">Login<img src="img/icons/double-arrow.png" alt="#"/></button>
                    </form>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                    <h3>Login!</h3>
                    <p>If you'd like to leave comments on our reviews or change your account, please log in!</p>

                </div>
            </div>
        </div>
    </section>
@endsection
