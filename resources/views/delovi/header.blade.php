<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>GameReviews - The Best Place To Learn About Games</title>
    <meta charset="UTF-8">
    <meta name="description" content="GameReviews The Best Place To Learn About Games">
    <meta name="keywords" content="gamerevies,gGaming, magazine, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('/')}}img/favicon.jpg" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}css/slicknav.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}css/magnific-popup.css"/>
    <link rel="stylesheet" href="{{asset('/')}}css/animate.css"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{asset('/')}}css/style.css"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>



<!-- Header section -->
<header class="header-section">
    <div class="header-warp">
        <div class="header-social d-flex justify-content-end">
            <p>Follow us:</p>
            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
            <a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a>
            <a href="https://www.behance.net/"><i class="fa fa-behance"></i></a>
        </div>
        <!-- errori i ostalo -->
        @include('flash-message')
        <div class="header-bar-warp d-flex">
            <!-- site logo -->
            <a href="{{url('/')}}" class="site-logo">
                <img src="{{asset('/')}}./img/logo3.png"  alt="">
            </a>
            <nav class="top-nav-area w-100">
                <div class="user-panel">
                    @if(!session()->has('user'))
                    <a href="{{url('/login')}}">Login</a> / <a href="{{url('/register')}}">Register</a>
                        @else
                        <a href="{{url('/logout')}}">Logout</a>
                        @endif
                </div>
                <!-- Menu -->


                <ul class="main-menu primary-menu">
                    <!-- menu logika-->
                    @if(!session('user'))
                    @foreach($menu as $link)
                        @if($link->type==1)

                        @if($link->name=='Author')
                        <li><a href="{{url($link->href)}}">{{$link->name}}</a>
                            <ul class="sub-menu">
                                @foreach($dropdown as $droplink)
                                <li><a target="_blank" href="{{url($droplink->href)}}">{{$droplink->name}}</a></li>
                                    @endforeach
                            </ul>

                        </li>
                            @else
                                    <li><a href="{{url($link->href)}}">{{$link->name}}</a></li>
                            @endif

                            @endif

                        @endforeach

                        @else
                        @switch(session('user')->role_name)
                            @case('admin'):
                            @foreach($menu as $link)
                            @if($link->type==1||$link->type==2)



                                    @if($link->name=='Author')
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a>
                                            <ul class="sub-menu">
                                                @foreach($dropdown as $droplink)
                                                    <li><a target="_blank" href="{{url($droplink->href)}}">{{$droplink->name}}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @else
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @break

                            @case('user'):
                            @foreach($menu as $link)
                                @if($link->type==1||$link->type==3)



                                    @if($link->name=='Author')
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a>
                                            <ul class="sub-menu">
                                                @foreach($dropdown as $droplink)
                                                    <li><a target="_blank" href="{{url($droplink->href)}}">{{$droplink->name}}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @else
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @break

                            @case('journalist'):
                            @foreach($menu as $link)
                                @if($link->type==1||$link->type==3 || $link->type==4)



                                    @if($link->name=='Author')
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a>
                                            <ul class="sub-menu">
                                                @foreach($dropdown as $droplink)
                                                    <li><a target="_blank" href="{{url($droplink->href)}}">{{$droplink->name}}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @else
                                        <li><a href="{{url($link->href)}}">{{$link->name}}</a></li>
                                @endif
                                @endif
                            @endforeach
                            @break


                        @endswitch
                        @endif
                <!-- menu logika-->






                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Header section end -->


<!-- Page top section -->
@yield('page-top')

<!-- Page top end-->
