@extends('layouts.layout')
@section('page-top')
    <section class="page-top-section set-bg" data-setbg="{{asset('/')}}img/page-top-bg/{{rand(1,4)}}.jpg">
        <div class="page-info">
            <h2>Review</h2>
            <div class="site-breadcrumb">
                <a href="{{asset('/reviews')}}">Reviews</a>  /
                <span>Review</span>
            </div>
        </div>
    </section>

@endsection

@section('sadrzaj')
<!-- Games section -->
@isset($post)
<section class="games-single-page">
    <div class="container">
        <div class="game-single-preview">
            <img src="{{asset('/')}}img/games/{{$post->post_image}}" alt="">   <!-- baza -->
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
                <div class="gs-meta">{{date('d.m.Y',$post->post_created_on)}}  /  by {{$post->name.' '.$post->lastname}}</div>
                <h2 class="gs-title">{{$post->post_title}}</h2>
                <h4>Gameplay</h4>
                <p>{{$post->gameplay}}</p>
                <h4>Conclusion</h4>
                <p>{{$post->conclusion}}
                </p>

            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
                <div id="stickySidebar">
                    <div class="widget-item">
                        <div class="rating-widget">
                            <h4 class="widget-title">Ratings</h4>
                            <ul>
                                <li>Price<span>{{$post->price}}/5</span></li>
                                <li>Graphics<span>{{$post->graphics}}/5</span></li>
                                <li>Levels<span>{{$post->levels}}/5</span></li>
                                <li>Difficulty<span>{{$post->difficulty}}/5</span></li>
                            </ul>
                            <div class="rating">
                                <h5><i>Rating</i><span>{{$post->final_rating}}</span> / 5</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- Games end-->
<div id="comments">
@foreach($comment as $c)
<section class="game-author-section">
    <div class="container">
        <div class="game-author-pic set-bg" data-setbg="{{asset('/')}}img/{{$c->avatar}}"></div>
        <div class="game-author-info">
            <h4>{{$c->name." ".$c->lastname}} / {{date('d.m.Y',$c->comment_created_on)}}</h4>
            <p>{{$c->comment}}</p>
        </div>
    </div>

</section>
    @endforeach
</div>


@if(session()->has('user'))

<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order-2 order-lg-1">
                <form class="contact-form" method="post">
                    @CSRF

                    <textarea id="comment" name="comment" placeholder="Your comment"></textarea>
                    <input type="hidden" id="post_id" name="post_id" value="{{$post->id_post}}">


                    <button type="submit" id='btnComment' name="btnComment" class="site-btn">Comment<img src="{{asset('/')}}img/icons/double-arrow.png" alt="#"/></button>
                </form>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                <h3>Leave a comment!</h3>
                <p>Share your thoughts about this review!</p>

            </div>
        </div>
    </div>
</section>

    @endif


@endisset

  @endsection
