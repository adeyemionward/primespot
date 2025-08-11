<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>PrintLabs | Printing services in Nigeria, Lagos, Benin city</title>
<meta name="description" content>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/price_rangs.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- <script nonce="3266048e-d3c3-4011-98d7-9dde4087e878">(function(w,d){!function(L,M,N,O){L[N]=L[N]||{};L[N].executed=[];L.zaraz={deferred:[],listeners:[]};L.zaraz.q=[];L.zaraz._f=function(P){return async function(){var Q=Array.prototype.slice.call(arguments);L.zaraz.q.push({m:P,a:Q})}};for(const R of["track","set","debug"])L.zaraz[R]=L.zaraz._f(R);L.zaraz.init=()=>{var S=M.getElementsByTagName(O)[0],T=M.createElement(O),U=M.getElementsByTagName("title")[0];U&&(L[N].t=M.getElementsByTagName("title")[0].text);L[N].x=Math.random();L[N].w=L.screen.width;L[N].h=L.screen.height;L[N].j=L.innerHeight;L[N].e=L.innerWidth;L[N].l=L.location.href;L[N].r=M.referrer;L[N].k=L.screen.colorDepth;L[N].n=M.characterSet;L[N].o=(new Date).getTimezoneOffset();if(L.dataLayer)for(const Y of Object.entries(Object.entries(dataLayer).reduce(((Z,$)=>({...Z[1],...$[1]})),{})))zaraz.set(Y[0],Y[1],{scope:"page"});L[N].q=[];for(;L.zaraz.q.length;){const ba=L.zaraz.q.shift();L[N].q.push(ba)}T.defer=!0;for(const bb of[localStorage,sessionStorage])Object.keys(bb||{}).filter((bd=>bd.startsWith("_zaraz_"))).forEach((bc=>{try{L[N]["z_"+bc.slice(7)]=JSON.parse(bb.getItem(bc))}catch{L[N]["z_"+bc.slice(7)]=bb.getItem(bc)}}));T.referrerPolicy="origin";T.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(L[N])));S.parentNode.insertBefore(T,S)};["complete","interactive"].includes(M.readyState)?zaraz.init():L.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head> --}}
<body>

<div id="preloader-active">
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class="preloader-circle"></div>
<div class="preloader-img pere-text">
@if (is_null($site_details->site_logo1 ?? ''))
Logo
@else
    @if ($site_details)
        @if (env('APP_ENV') == 'local')
            <img src="{{ asset('siteimages/'.$site_details->site_logo1) }}" alt="site_logo" style="height: 100px; width: 100px; border-radius: 50%">
        @else
            <img src="{{ asset('siteimages/'.$site_details->site_logo1) }}" alt="site_logo" style="height: 100px; width: 100px; border-radius: 50%">
        @endif
    @endif
@endif

</div>
</div>
</div>
</div>
<style>
    .cart2{
        position:relative

    }
    .header-area .header-mid .menu-wrapper .header-right .cart2::after{
        -webkit-transition:all .4s ease-out 0s;-moz-transition:all .4s ease-out 0s;-ms-transition:all .4s ease-out 0s;
        -o-transition:all .4s ease-out 0s;transition:all .4s ease-out 0s;position:absolute;content:"{{$cartCount}}";
        background:red;
        color:#fff;text-align:center;border-radius:50%;font-size:12px;top:-7px;right:0px;padding:1px 7px
    }
</style>
<header>
<div class="header-area">
<div class="header-top d-none d-sm-block">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="d-flex justify-content-between flex-wrap align-items-center">
<div class="header-info-left">
<!-- <ul>
<li><a href="#">About Us</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">FAQ</a></li>
<li><a href="#">Careers</a></li>
</ul> -->
</div>
<div class="header-info-right d-flex">
<ul class="order-list">
<!-- <li><a href="#">My Wishlist</a></li> -->
<li><a href="{{route('track_orders.index')}}">Track Your Order</a></li>

<li><i class="fa fa-phone"> <a href="tel:08035777226">Call: {{$site_details->phone_1 ?? 'No phone'}}</a></i></li>
</ul>
<ul class="header-social">

<!-- <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
<li><a href="#"><i class="fab fa-twitter"></i></a></li>
<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
<li> <a href="#"><i class="fab fa-youtube"></i></a></li> -->

@if (Auth::check())
<li id="submenu1">
    <a href="#" style="color: #FF2020">{{Auth::user()->firstname}} {{Auth::user()->lastname}}<i class="fas fa-angle-down"></i></a>
    <ul class="submenu">
        <li class="logout"><a href="{{route('logout')}}" style="color: black;">Logout</a></li> <br>
        <li class="logout1"><a href="{{route('profile.index')}}" style="color: black;">Profile</a></li> <br>
        <li class="logout1"><a href="{{route('profile.change_password')}}" style="color: black;">Change Password</a></li>
    </ul>
</li>
@else
<li><a href="{{route('login')}}" style="color: {{$site_details->siteTheme->name ?? 'red' }};">Login</a></li>
<li><a href="{{route('register')}}" style="color: {{$site_details->siteTheme->name ?? 'red' }};">Create Account</a></li>
@endif
</ul>

</div>
</div>
</div>
</div>
</div>
</div>
<div class="header-mid header-sticky">
<div class="container">
<div class="menu-wrapper">

<div class="logo">
<a href="{{route('index')}}"><img src="{{ asset('siteimages/'.@$site_details->site_logo1) }}" style="width: 200px; height:100px" alt="site logo"></a>
</div>

<div class="main-menu d-none d-lg-block">
<nav>
<ul id="navigation">
<li><a href="{{route('index')}}">Home</a></li>
<li><a href="{{route('index')}}#buy_products">Printing Services</a></li>

<li><a href="{{route('video_brochure.index')}}">Video Brochure</a></li>


<li><a href="{{route('contact.index')}}">Contact</a></li>







</ul>
</nav>
</div>

<div class="header-right">
<ul>
<li>
<div class="nav-search search-switch hearer_icon">
<a id="search_1" href="javascript:void(0)">
<span class="flaticon-search"></span>
</a>
</div>
</li>
{{-- <li class="cartn">
    <a href="{{route('logout')}}"><span class="flaticon-user"></span></a>
</li> --}}


<li class="cart2" > <a href="{{route('cart.index')}}"><span class="flaticon-shopping-cart"></span></a> </li>
</ul>
</div>
</div>

<div class="search_input" id="search_input_box">
<form class="search-inner d-flex justify-content-between ">
<input type="text" class="form-control" id="search_input" placeholder="Search Here">
<button type="submit" class="btn"></button>
<span class="ti-close" id="close_search" title="Close Search"></span>
</form>
</div>

<div class="col-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
</div>
</header>
<main>
    @yield('content')


    <footer>
<div class="footer-wrapper gray-bg">
<div class="footer-area footer-padding">



<div class="container">
<div class="row justify-content-between">
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
<div class="single-footer-caption mb-50">
<div class="single-footer-caption mb-20">

<div class="footer-logo mb-35">
<a href="{{route('index')}}"><img src="{{asset('img/printlab.PNG')}}" style="width: 200px;" alt></a>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Products</h4>
<ul>
<li><a href="{{route('product_categories','Higher_Education')}}">Higher Eduaction</a></li>
<li><a href="{{route('product_categories','Eighty_Leaves')}}">Eighty Leaves</a></li>
<li><a href="{{route('product_categories', 'Forty_Leaves')}}">Forty Leaves</a></li>
<li><a href="{{route('product_categories','Twenty_Leaves')}}">Twenty Leaves</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Quick Links</h4>
<ul>
<li><a href="{{route('index')}}#buy_products">Printing Services</a></li>
<li><a href="{{route('contact.index')}}">Contact</a></li>
<li><a href="{{route('login')}}">Login</a></li>
<li><a href="{{route('register')}}">Create Customer Account</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
    <div class="single-footer-caption mb-50">
        <div class="footer-tittle">
            <h4>Contact</h4>
            <ul style="color: #BBB9B5">
                <li>Address: {{$site_details->address_1 ?? 'No Address'}}</li>
                {{-- <li>{{$site_details->address_2}}</li>
                <li>{{$site_details->address_3}}</li> --}}
                <li>Phone: {{$site_details->phone_1 ?? 'No Phone'}}</li>
                <li>Email: {{$site_details->email_1 ?? 'No Email'}}</li>
            </ul>
        </div>
    </div>
</div>

</div>
</div>
</div>

<div class="footer-bottom-area">
<div class="container">
<div class="footer-border">
<div class="row">
<div class="col-xl-12 ">
<div class="footer-copy-right text-center">
<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>

<div id="back-top">
<a class="wrapper" title="Go to Top" href="#">
<div class="arrows-container">
<div class="arrow arrow-one">
</div>
<div class="arrow arrow-two">
</div>
</div>
</a>
</div>


<script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>


<script src="{{asset('assets/js/contact.js')}}"></script>
<script src="{{asset('assets/js/jquery.form.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/mail-script.js')}}"></script> --}}
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');

    $(".submenu").hide();
    $("#submenu1").click(function(){
        $(".submenu").toggle();
    })
</script>

{{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"8375b993ec2324d2","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script> --}}
@if(Session::has("flash_success"))
        <script>
            toastr.success("{!! Session::get('flash_success') !!}");
        </script>
    @endif

    @if(Session::has("flash_error"))
        <script>
            toastr.error("{!! Session::get('flash_error') !!}");
        </script>
    @endif

    @yield('scripts')
</body>

</html>
