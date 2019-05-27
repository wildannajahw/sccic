@extends('layouts.global')

@section('content')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-md-6">
                <div class="banner_text">
                    <div class="banner_text_iner text-center">
                        <h2>Think <span>Creative Turn</span> </h2>
                        <h3>Ideas Into Life</h3>
                        @guest
                            @if (Route::has('register'))
                            <a href="{{ route('login') }}" class="btn_1">Login <i class="ti-angle-right"></i> </a>
                            @endif
                            @else
                            <a href="{{  route('home') }}" class="btn_1">Pilih <i class="ti-angle-right"></i> </a>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="banner_bg">
                    <img src="img/banner_img.png" alt="banner">
                </div>
            </div>
        </div>
    </div>
    <div class="hero-app-1 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
    <div class="hero-app-5 custom-animation2"><img src="img/animate_icon/icon_3.png" alt=""></div>
    <div class="hero-app-7 custom-animation3"><img src="img/animate_icon/icon_2.png" alt=""></div>
    <div class="hero-app-8 custom-animation"><img src="img/animate_icon/icon_4.png" alt=""></div>
</section>
<!-- banner part start-->



<!-- service_part part start-->

<section class="team_member_section section_padding">
    <div class="container">
            <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_team_member">
                                <div class="single_team_text">
                                        @if($event->logo)
                                        <img src="{{asset('storage/'.$event->logo)}}"width="70px"/>
                                    @else
                                        N/A
                                    @endif
                                    <p>{{$event->event_name}}</p>
                                    <p>{{$event->location}}</p>
                                    <div class="row team_member_social_icon">
                                            <a href="#">kuota: {{$event->quota_participant}}</a>
                                            <a href="#">start date: {{$event->start_date}}</a>
                                            <a href="#">finish date: {{$event->finish_date}}</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    </div>
</section>
<!-- team_member part end-->

<!--::blog_part end::-->
@endsection
