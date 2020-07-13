@extends('layouts.layout')
@section('page-top')
    <section class="page-top-section set-bg" data-setbg="{{asset('/')}}img/page-top-bg/{{rand(1,4)}}.jpg">
        <div class="page-info">
            <h2>Review</h2>
            <div class="site-breadcrumb">
                <a href="{{asset('/')}}">Home</a>  /
                <span>Review</span>
            </div>
        </div>
    </section>

@endsection

@section('sadrzaj')

<!-- Review section -->
<section class="review-section">
    <div class="container">
        <div class="widget-item">
            <form class="search-widget">
                @CSRF
                <input placeholder="Looking for a specific review?" type="text" id="searchText">
                <button type="submit" id="btnSearch">search</button>
            </form>
        </div>
        <div id="review-holder">
            @foreach($posts as $post)
                <div class="review-item">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="review-pic">
                                <img src="{{asset('/img/games/'.$post->post_image)}}" alt="{{$post->post_title}}">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="review-content text-box text-white">
                                <div class="rating">
                                    <h5><i>Rating</i><span>{{$post->final_rating}}</span> / 5</h5>
                                </div>
                                <div class="top-meta">{{date('d.m.Y',$post->post_created_on)}} / by {{$post->name.' '.$post->lastname}}</div>
                                <h3>{{$post->post_title}}</h3>
                                <p>{{\Illuminate\Support\Str::limit($post->gameplay,500)}}</p>
                                <a href="{{url('/reviews/'.$post->id_post)}}" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="#"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}}





        </div>






    </div>
</section>
<!-- Review section end-->


    @endsection
