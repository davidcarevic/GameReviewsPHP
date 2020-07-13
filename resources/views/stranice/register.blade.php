@extends('layouts.layout')
@section('page-top')
    <section class="page-top-section set-bg" data-setbg="{{asset('/')}}img/page-top-bg/{{rand(1,4)}}.jpg">
        <div class="page-info">
            <h2>Register</h2>
            <div class="site-breadcrumb">
                <a href="{{asset('/')}}">Home</a>  /
                <span>Register</span>
            </div>
        </div>
    </section>

@endsection

@section('sadrzaj')
    <section class="contact-page">
        <div class="container">
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
                    <form class="contact-form" method="post" action="{{url('/register')}}">
                        @CSRF

                        <input class="spi" type="text" id="email" name="email" placeholder="Your e-mail">
                        <input class="spi" type="password" id="pass1" name="pass1" placeholder="Password">
                        <input class="spipass" type="password" id="pass2" name="pass2" placeholder="Confirm your password">
                        <input class="spi" type="text" id="name" name="name" placeholder="Name">
                        <input class="spi" type="text" id="lastname" name="lastname" placeholder="Lastname">


                        <button type="submit" name="btnReg" id="btnReg" class="site-btn">Create your account<img src="img/icons/double-arrow.png" alt="#"/></button>
                    </form>

                </div>

                <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                    <h3>Create your account!</h3>
                    <p>Would you like to be able to comment on our reviews? If so, please create an account and join the conversation. Once you create your account, please go to your user page and add an avatar.</p>

                </div>
            </div>
        </div>
    </section>
@endsection

