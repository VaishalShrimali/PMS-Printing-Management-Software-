@extends('layout/frontend')
@section('content')
<!-- hero Area start -->

<div class="hero-area pt-145 pb-75 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content rmb-55 wow fadeInUp delay-0-2s">
                    <span class="sub-title mb-15">Printing Comapny</span>
                    <h1>We’re Pixel Perfect Printing Company</h1>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                        demoralized</p>
                    <ul class="list-style-one pt-10 wow fadeInUp delay-0-3s">
                        <li>Quality Services Provider</li>
                        <li>Printing, Designing and Transportation</li>
                    </ul>
                    <div class="hero-btns pt-25 wow fadeInUp delay-0-4s">
                        <a href="#footer" class="theme-btn">Talk With Us <i class="far fa-long-arrow-right"></i></a>
                        <!-- <a href="contact.html" class="theme-btn style-three">Latest Projects <i
                                class="far fa-long-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-images wow fadeInLeft delay-0-2s">
                    <img class="w-100" src="/front_assets/images/hero-right.png" alt="Hero Image">
                    <img class="image-one wow fadeInRight delay-0-6s" src="/front_assets/images/hero-1.png"
                        alt="Hero Image">
                    <img class="image-two wow fadeInDown delay-0-8s" src="/front_assets/images/hero-2.png"
                        alt="Hero Image">
                    <div class="circle-shapes">
                        <div class="shape-inner">
                            <span class="dot-one"></span>
                            <span class="dot-two"></span>
                            <span class="dot-three"></span>
                            <span class="dot-four"></span>
                            <span class="dot-five"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero Area end -->
<section class="services-area-four pt-120 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title text-center mb-55 wow fadeInUp delay-0-2s">
                    <span class="sub-title mb-10">Latest Services</span>
                    <h2>Best Category For Printing</h2>
                </div>
            </div>
        </div>
        <div class="services-four-slider">
            @foreach($categorys as $category)
            <div class="service-item-four wow fadeInUp delay-0-2s">
                <div class="image">
                    <img src="{{url('uploads/category/'.$category->category_img)}}" alt="Service" width="">
                </div>
                <div class="content">
                    <h4><a href="{{url('/category/'.$category->id)}}">{{$category->category_name}}</a></h4>
                    <span>Dispatch Time</span><p>{{$category->dispatch_time}}</p>
                    <a href="{{url('/category/'.$category->id)}}" class="theme-btn style-three">Read More <i
                            class="far fa-long-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection