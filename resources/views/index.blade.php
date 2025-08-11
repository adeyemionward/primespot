@extends('layout.landing_master')
@section('content')
@section('title', 'Add Supplier')
<style>
@media screen and (min-width: 768px) {
    .hero1{
        margin-top: -150px;
    }

    .more_service{
        margin-top:-80px;
    }
}
@media screen and (max-width: 768px) {

  .hero-caption{
    margin-top: 50px;
  }


  .hero1{
    margin-top: 60px;
  }


  .latest-items{
    position: relative;
    top: 80px;
  }
  #popular_product_text{
    padding-left:30px;
    margin-top: 150px;
    font-weight: bolder;
  }
}
a.contact_now {
    background:transparent;
    padding:20px 40px 20px 40px;
    font-size:25px;
    margin-bottom:30px;
    border:2px solid #FF2020;
}

a span{
    color:red;
}

a.contact_now:hover {
    background-color: #e74c3c;
    color:#fff;

}
a span:hover{
    color:#fff;
}
#popular_product_text_right:hover{
    color:red;
    text-decoration:underline;
}
</style>
{{-- $site_details is from company provider --}}
<section class="hero1" >
    <div class="">

    <div class=" slider-height d-flex align-items-center">
    <div class="container">
    <div class="row">
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12  col-sm-10">
    <div class="hero-caption text-center">
    <h1 data-animation="bounceIn" data-delay="0.2s" style=" color:#000; font-size:45px">{{$site_details->hero_text ?? 'No Hero Header'}}</h1>
    {{-- <p data-animation="fadeInUp" data-delay="0.4s" style=" color:#fff">A digital printing hub for high quality services and customer satisfaction.</p> --}}
    <a href="#buy_products" style="background-color:{{$site_details->siteTheme->name ?? 'red' }}; border-color: transparent; padding:25px 50px 25px 50px;" class="btn_1 hero-btn shop_now" data-animation="fadeInUp" data-delay="0.7s" style="margin-bottom:-2000px; margin-top:-80px">Shop Now</a>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
</section>



    <div class="latest-items section-padding fix" style="margin-top:-200px">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <div class="nav-button">
                        <nav>
                            <div class="nav-tittle" id="buy_products" style="margin-top:-80px">
                                <h2 id="popular_product_text_left" style="text-decoration:underline; color:red">Popular Products</h2>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col">
                    <div class="nav-button">
                        <nav>
                            <div class="nav-tittle" id="buy_products" style="margin-top:-80px">
                                <a href="#video_brochure"><h2 id="popular_product_text_right">Video Brochure</h2></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container" >
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="latest-items-active">
                        @forelse ($products as $val)
                            @php $product_name = ucwords(str_replace('_',' ', $val->name))   @endphp
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        {{-- <a href="{{route('product_details',[$val->name, $val->id])}}"><img src="assets/img/gallery/hero1.jpg" style="height: 320px;" alt></a> --}}
                                        <a href="{{route('product_details',[$val->name, $val->id])}}">
                                            @if ( env('APP_ENV') == 'local')
                                                <img src="{{asset($val->image)}}" style="height: 320px;" alt="product_image">
                                            @else
                                                <img src="{{asset($val->image)}}" style="height: 320px;" alt="product_image">
                                            @endif

                                        </a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="{{route('product_details',[$val->name, $val->id])}}">{{$val->title}}</a></h3>
                                        <div class="">
                                            <div >
                                                <a href="{{route('product_details',[$val->name, $val->id])}}"><span><button class="btn btn-primary">Browse Details</button></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>No Product Available</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- video --}}
  
</div>
</div>

<div class="latest-items section-padding fix" id="video_brochure" style="margin-top:-150px">
    <div class="container">
        <div class="row justify-content-between">
        <div class="col-xl-12">
        <div class="nav-button">

        <nav>
        <div class="nav-tittle" id="buy_products" >
        <h2 id="popular_product_text" style="text-decoration:underline; color:red">Popular Video Brochure</h2>
        </div>

        </nav>

        </div>
        </div>
        </div>
    </div>
    <div class="container" >
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <div class="latest-items-active">
                    @forelse ($video_brochure as $val)
                        <div class="properties pb-30">
                            <div class="properties-card">
                                <div class="properties-img">
                                    <a href="{{route('product_details',[$val->name, $val->id])}}">
                                        @if ( env('APP_ENV') == 'local')
                                            <img src="{{asset($val->image)}}" style="height: 320px;" alt="product_image">
                                        @else
                                            <img src="{{asset($val->image)}}" style="height: 320px;" alt="product_image">
                                        @endif

                                    </a>

                                </div>
                                <div class="properties-caption properties-caption2">
                                    <h3><a href="{{route('product_details',[$val->name, $val->id])}}">{{$val->title}}</a></h3>
                                    <div class="properties-footer">
                                        <div class="price">
                                            <a href="{{route('product_details',[$val->name, $val->id])}}"><span><button class="btn btn-primary">Browse Details</button></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse


                </div>
            </div>
        </div>
    </div>



</div>
</div>
</div>

<section class="more_service"  >

    <div class="container">

        <div class="col-xl-12" style="display: flex;
        justify-content: center;
        align-items: center;
        height: 20vh;
        ">
            <div class="row">

                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8  col-sm-10">

                    <h2 data-animation="bounceIn" data-delay="0.2s" style=" color:#000; font-weight:300">Contact us for other printing service & corporate video profile</h2>

                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4  col-sm-10">

                    {{-- <h2 data-animation="bounceIn" data-delay="0.2s" style=" color:#000;">Contact us for other printing service</h2> --}}
                    <a class="btn_1 hero-btn contact_now"  href="{{route('contact.index')}}"  style="border-color:{{$site_details->siteTheme->name ?? 'red' }}"> <span style="color:{{$site_details->siteTheme->name ?? 'red' }}">Contact now</span></a>

                </div>
            </div>

        </div>
    </div>

    </section>

<div class="testimonial-area testimonial-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-11">
                <div class="h1-testimonial-active">
                    @forelse ($all_testimonial as $val)
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <h2>Customer Testimonial</h2>
                                    <p>{{$val->description}}</p>
                                </div>



                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            @if ( env('APP_ENV') == 'local')
                                                <img src="{{asset($val->image)}}" alt style="height: 100px; width:100px; border-radius:50%">
                                            @else
                                                <img src="{{asset($val->image)}}"  alt="customer_image" style="height: 100px; width:100px; border-radius:50%">
                                            @endif
                                        </div>
                                    <div class="founder-text">
                                        <span>{{$val->customer->firstname.' '.$val->customer->lastname}}</span>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>




<div class="categories-area">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
<div class="cat-icon">
<img src="assets/img/icon/services1.svg" alt>
</div>
<div class="cat-cap">
<h5>Attention to Detail</h5>
<p>
    We understand that every project is unique. Our team pays meticulous attention to detail,
    ensuring that every aspect of your
    service experience is carefully considered and executed to perfection.
</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
<div class="cat-icon">
<img src="assets/img/icon/services2.svg" alt>
</div>
<div class="cat-cap">
<h5>Professional Expertise</h5>
<p>
    With a team of skilled professionals, we bring expertise to the table.
    From project initiation to completion, you can trust that your requirements are in the hands
    of seasoned professionals who are committed to delivering the best
</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
<div class="cat-icon">
<img src="assets/img/icon/services3.svg" alt>
</div>
<div class="cat-cap">
<h5>Cutting-Edge Technology</h5>
<p>
    We invest in the latest technologies to ensure that our services are at the forefront of industry standards.
    This commitment allows us to deliver high-quality results efficiently and effectively.
</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
<div class="cat-icon">
<img src="assets/img/icon/services4.svg" alt>
</div>
<div class="cat-cap">
<h5>Timely Delivery</h5>
<p>
    We understand the importance of deadlines. Our efficient processes and proactive approach enable us to
    consistently deliver services on time, providing you with the reliability you deserve.
</p>
</div>
</div>
</div>
</div>
</div>
</div>

</main>
@endsection
