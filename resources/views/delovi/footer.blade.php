<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <a href="{{url('/')}}" class="footer-logo">
            <img src="{{asset('/')}}./img/logo3.png" alt="">
        </a>
        <ul class="main-menu footer-menu">
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
        <div class="footer-social d-flex justify-content-center">
            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
            <a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a>
            <a href="https://www.behance.net/"><i class="fa fa-behance"></i></a>
        </div>
        <div class="copyright"><a href=""><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
    </div>
</footer>
<!-- Footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="{{asset('/')}}js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<script src="{{asset('/')}}js/jquery.slicknav.min.js"></script>
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}js/jquery.sticky-sidebar.min.js"></script>
<script src="{{asset('/')}}js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}js/main.js"></script>
<script src="{{asset('/')}}js/mojJs.js"></script>
<script src="{{asset('/')}}js/ajax_insert_comment.js"></script>
<script src="{{asset('/')}}js/ajax_post_search.js"></script>



</body>
</html>
