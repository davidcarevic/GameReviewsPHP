@extends('layouts.layout')
@section('sadrzaj')
    {{--@if(Session::has('message'))--}}
        {{--<p class="alert alert-info">{{ Session::get('message') }}--}}
            {{--<button id="alertClose">Ok</button>--}}

        {{--</p>--}}
    {{--@endif--}}

<!-- Hero section -->
<section class="hero-section overflow-hidden">
    <div class="hero-slider owl-carousel">
        @foreach($slider as $s)
        <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="{{asset('/img/'.$s->slider_image)}}">
            <div class="container">
                <h2>{{$s->slider_title}}</h2>
                <p>{{$s->slider_text}}</p>
                <a href="{{url($s->slider_link)}}" class="site-btn">Read More  <img src="img/icons/double-arrow.png" alt="arrow"/></a>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- Hero section end-->


<!-- Intro section -->
<section class="intro-section">

    <div class="container">
        <div class="section-title text-white">
            <h2>Latest Comments</h2>
        </div>
    <br/>


        <div class="row">
            @foreach($comments as $comment)
            <div class="col-md-4">
                <div class="intro-text-box text-box text-white">
                    <div class="top-meta">{{date('d.m.Y',$comment->comment_created_on)}}  /  by <span>{{$comment->name.' '.$comment->lastname}}</span></div>
                    <h3>
                        {{$comment->post_title}}
                    </h3>
                    <p>{{\Illuminate\Support\Str::limit($comment->comment,160)}}</p>
                    <a href="{{url('/reviews/'.$comment->id_post)}}" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="bla"/></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Intro section end -->


<!-- Blog section -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="section-title text-white">
                    <h2>Latest Reviews</h2>
                </div>

                @foreach($posts as $post)

                <!-- Blog item -->
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{asset('/img/games/'.$post->post_image)}}" alt="game">
                    </div>
                    <div class="blog-text text-box text-white">
                        <div class="top-meta">{{date('d.m.Y',$post->post_created_on)}}  /  in <a href="{{url('/reviews')}}">Reviews</a></div>
                        <h3>{{$post->post_title}}</h3>
                        <p>{{\Illuminate\Support\Str::limit($post->gameplay,300)}}</p>
                        <a href="{{url('/reviews/'.$post->id_post)}}" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="arrow"/></a>
                    </div>
                </div>
                @endforeach()


            </div>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->


<!-- Intro section -->
<section class="intro-video-section set-bg d-flex align-items-end " data-setbg="{{asset('/img/'.$promo->promo_image)}}">
    <a href="{{$promo->promo_link}}" class="video-play-btn video-popup"><img src="{{asset('/')}}img/icons/solid-right-arrow.png" alt="icon"></a>
    <div class="container">
        <div class="video-text">
            <h2>{{$promo->promo_title}}</h2>
            <p>{{$promo->promo_text}}</p>
        </div>
    </div>
</section>
<!-- Intro section end -->


<!-- Featured section -->
<section class="featured-section">
    <div class="featured-bg set-bg" data-setbg="{{asset('/img/games/'.$featured->post_image)}}"></div>
    <div class="featured-box">
        <div class="text-box">
            <div class="top-meta">{{date('d.m.Y',$featured->post_created_on)}}  /  in <a href="{{url('/reviews')}}">Reviews</a></div>
            <h3>{{$featured->post_title}}</h3>
            <p>{{\Illuminate\Support\Str::limit($featured->gameplay,500)}}</p>
            <a href="{{url('/reviews/'.$featured->id_post)}}" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="arrow"/></a>
        </div>
    </div>
</section>
<!-- Featured section end-->

    @endsection
