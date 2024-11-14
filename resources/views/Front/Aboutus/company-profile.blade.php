@extends('Front.Layout.master-layout')
@section('styles')
    @php
        $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
        if (isset($companyProfile->banner_image) && $companyProfile->banner_image != null) {
            $mainImageUrl =
                asset('storage/app/public/uploads/companyprofile/banner_image') . '/' . $companyProfile->banner_image;
        }
    @endphp
    <style>
        .sub-header-main .background-sub {
            background-image: url({{ $mainImageUrl }})
        }
    </style>
@endsection
@section('content')
    <!--=============== Slider ===========-->

    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($companyProfile->banner_title) && $companyProfile->banner_title != null || isset($companyProfile->banner_description) && $companyProfile->banner_description != null) @else background-none @endif">
            <div class="container @if(isset($companyProfile->banner_title) && $companyProfile->banner_title != null || isset($companyProfile->banner_description) && $companyProfile->banner_description != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! $companyProfile->banner_title !!}
                    {!! $companyProfile->banner_description !!}
                </div>
            </div>
        </div>
    </section>

    <!--=============== Slider END ===========-->

    <section class="about-section">
        <div class="container">

            <div class="section-title mt-md-0 mt-3">
                {!! $companyProfile->about_pchpl_title !!}
            </div>
            <div class="paragraph-wrapper">
                {!! $companyProfile->about_pchpl_description !!}
            </div>
        </div>
    </section>
    @if (isset($companyProfile) && $companyProfile->video_url != null)
        <section class="viadeo-section">

            <div class="container">

                <div class="video-wrapper">
                    <div class="video-container" id="video-container">

                        <iframe width="100%" src="{{  $companyProfile->video_url}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        {{-- <div class="play-button-wrapper">
                            <div title="Play video" class="play-gif" id="circle-play-b" data-iframe="{{$companyProfile->video_url}}">
                                <!-- SVG Play Button -->
                                <img src="{{ URL::asset('resources/front-asset/images/viadeo-play-icon.png') }}"
                                    alt="">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </section>
    @endif

    <section class="">
        <div class="container ">
            <div class="row align-items-center d-md-flex section-space">
                @if (isset($companyProfile->mission_image) && $companyProfile->mission_image != null)
                    <div class="col-md-6">
                        <img src="{{ asset('storage/app/public/uploads/companyprofile/mission_image') . '/' . $companyProfile->mission_image }}"
                            class="img-fluid h-100 w-100">
                    </div>
                @endif
                <div class="col-md-6">

                    <div class="section-title mt-md-0 mt-3">
                        {!! $companyProfile->mission_title !!}
                    </div>
                    <div class="paragraph-wrapper">
                        {!! $companyProfile->mission_description !!}
                        @if(isset($companyProfile->mission_button_title) && $companyProfile->mission_button_title != null && isset($companyProfile->mission_button_url) && $companyProfile->mission_button_url != null)
                            <a href="{{ $companyProfile->mission_button_url }}" class="btn button-dark mt-3">{{ $companyProfile->mission_button_title }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-center d-md-flex section-space">
                <div class="col-md-6 order-md-0 order-1">
                    <div class="section-title mt-md-0 mt-3">
                        {!! $companyProfile->vision_title !!}
                    </div>
                    <div class="paragraph-wrapper">
                        {!! $companyProfile->vision_description !!}
                        @if(isset($companyProfile->vision_button_title) && $companyProfile->vision_button_title != null && isset($companyProfile->vision_button_url) && $companyProfile->vision_button_url != null)
                            <a href="{{ $companyProfile->vision_button_url }}"
                            class="btn button-dark mt-3">{{ $companyProfile->vision_button_title }}</a>
                        @endif
                    </div>
                </div>
                @if (isset($companyProfile->vision_image) && $companyProfile->vision_image != null)
                    <div class="col-md-6  ">
                        <img src="{{ asset('storage/app/public/uploads/companyprofile/vision_image') . '/' . $companyProfile->vision_image }}"
                            class="img-fluid h-100 w-100">
                    </div>
                @endif
            </div>

            <div class="row align-items-center d-md-flex section-space">
                @if (isset($companyProfile->we_believe_image) && $companyProfile->we_believe_image != null)
                    <div class="col-md-6">
                        <img src="{{ asset('storage/app/public/uploads/companyprofile/we_believe_image') . '/' . $companyProfile->we_believe_image }}"
                            class="img-fluid h-100 w-100">
                    </div>
                @endif
                <div class="col-md-6">

                    <div class="section-title mt-md-0 mt-3">
                        {!! $companyProfile->we_believe_title !!}
                    </div>
                    @if (isset($weBelievePoints))
                        <ul class="odd-even-listing mt-4 ">
                            @foreach ($weBelievePoints as $weBelievePoint)
                                <li>
                                    <div class="d-flex align-items-center mb-2">
                                        <div><img src="{{ URL::asset('resources/front-asset/images/right-icon.svg') }}"
                                                class="list-true-icon" alt=""></div>
                                        <div class="list-text">{{ $weBelievePoint->point }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

        </div>
    </section>

    <section class="our-achive-ment-section-dark">
        <div class="background-dark-green">
            <div class="container">
                <div class="section-title-light mt-md-0 mb-4 text-center">
                    {!! $companyProfile->achievements_title !!}
                </div>
                @if (isset($achievements) && count($achievements))
                    <div class="row justify-content-center justify-content-lg-start">
                        @foreach ($achievements as $achievement)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4 mb-lg-0">
                                <div class="crartificate-box">
                                    @if (isset($achievement->image) && $achievement->image != null)
                                        <div class="img-ceartificate">
                                            <img src="{{ asset('storage/app/public/uploads/achievements/image') . '/' . $achievement->image }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    @endif
                                    <div class="inner-content">
                                        {!! $achievement->title !!}
                                        {!! $achievement->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
                <div class="button text-center">
                    <a href="{!! $companyProfile->achievements_button_url !!}" class="btn btn-view-more-light">{!! $companyProfile->achievements_button_title !!}</a>
                </div>

            </div>
        </div>
    </section>

    <section class="directors-section">
        <div class="container ">
            <div class="section-title text-center mt-md-0 mt-3">
                {!! $companyProfile->directors_title !!}
            </div>
            @if (isset($directors) && count($directors))
                <div class="row justify-content-center mt-5">
                    @foreach ($directors as $director)
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="director-div">
                                @if (isset($director->image) && $director->image != null)
                                <div class="man-img-socialmedia">
                                    <img src="{{ URL::asset('storage/app/public/uploads/Directors') }}/{{ $director->image }}"
                                        class="img-fluid" />
                                    </div>
                                @endif
                                <h3>{{ $director->name }}</h3>

                                <div class="paragraph-wrapper">
                                    <p>{{ $director->designation }}</p>
                                </div>

                                <div class="social-media-direction mt-3 mb-4 mb-lg-0">
                                    <ul class="d-flex justify-content-center">
                                        @if (isset($director->insta_link) && $director->insta_link != null)
                                            <li class="me-3">
                                                <a href="{{ $director->insta_link }}">
                                                    <img src="{{ URL::asset('resources/front-asset/images/instagram.svg') }}"
                                                        class="rounded-0" />
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($director->fb_link) && $director->fb_link != null)
                                            <li class="me-3">
                                                <a href="{{ $director->fb_link }}">
                                                    <img src="{{ URL::asset('resources/front-asset/images/facebook.svg') }}"
                                                        class="rounded-0" />
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($director->twitter_link) && $director->twitter_link != null)
                                            <li class="me-3">
                                                <a href="{{ $director->twitter_link }}">
                                                    <img src="{{ URL::asset('resources/front-asset/images/twitter.svg') }}"
                                                        class="rounded-0" />
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($director->linkedin_link) && $director->linkedin_link != null)
                                        <li class="me-3">
                                            <a href="{{ $director->linkedin_link }}">
                                                <img src="{{ URL::asset('resources/front-asset/images/link.svg') }}"
                                                    class="rounded-0" alt="">
                                            </a>
                                        </li>
                                        @endif
                                        @if (isset($director->youtube_link) && $director->youtube_link != null)
                                        <li>
                                            <a href="{{ $director->youtube_link }}">
                                                <img src="{{ URL::asset('resources/front-asset/images/you.svg') }}"
                                                    class="rounded-0" alt="">
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@if(isset($trustedPartners) && count($trustedPartners))
    <section class="trusted-partners-section">
        <div class="container">
            <div class="section-title text-center">
                {!! $companyProfile->trusted_partners_title !!}
            </div>
            <div class="sub-heading">{!! $companyProfile->trusted_partners_description !!}</div>
            @if (isset($trustedPartners) && count($trustedPartners))
                <div class="swiper logo-partner mt-5">
                    <div class="swiper-wrapper">
                        @foreach ($trustedPartners as $trustedPartner)
                        <div class="swiper-slide">
                            <div class="logo-slider">
                                        @if (isset($trustedPartner) && $trustedPartner != null)
                                        <img src="{{ asset('storage/app/public/uploads/trustedpartner/image') . '/' . $trustedPartner->image }}"
                                            alt="">
                                            @endif
                                    </div>
                                </div>
                        @endforeach

                    </div>
                </div>
            @endif
        </div>
    </section>
    @endif

    <section class="division-section">
        <div class="container">
            <div class="section-title-light text-center">
                {!! $companyProfile->division_sister_concerns_title !!}
            </div>
            @if (isset($divisionAndSisterConcerns) && count($divisionAndSisterConcerns))
                <div class="swiper division_sister_slider mt-4">
                    <div class="swiper-wrapper">
                        @foreach ($divisionAndSisterConcerns as $divisionAndSisterConcern)
                            <div class="swiper-slide">
                                <div class="division-sister-concerns">
                                    @if (isset($divisionAndSisterConcern) && $divisionAndSisterConcern != null)
                                    <a href="javascript:void(0);">

                                        <div class="image-division">
                                            <img src="{{ asset('storage/app/public/uploads/divisionandsisterconcern/image') . '/' . $divisionAndSisterConcern->image }}"
                                                alt="">
                                        </div>
                                    </a>

                                    @endif
                                    <div class="inner-content_logo-slider">
                                        {!! $divisionAndSisterConcern->title !!}
                                        {!!  strlen($divisionAndSisterConcern->description) > 120 ? substr(strip_tags($divisionAndSisterConcern->description), 0, 120) . '...' : strip_tags($divisionAndSisterConcern->description) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            @endif
        </div>

    </section>

    <section class="contract-manufacturer-section">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>Contract Manufacturer</h2>
            </div>
            @if (isset($contractManufacturers) && count($contractManufacturers))
                <div class="swiper contract-manufacturer mt-4">
                    <div class="swiper-wrapper">
                        @foreach ($contractManufacturers as $contractManufacturer)
                            @if (isset($contractManufacturer) && $contractManufacturer->image != null)
                                <div class="swiper-slide">
                                    <div class="contract-box">
                                        <img src="{{ asset('storage/app/public/uploads/contractmanufacturer/image') . '/' . $contractManufacturer->image }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
            @endif
        </div>
    </section>

    <section class="our-products-range-section meet-pchpcl-team-section">
        <div class="container">
            <div class="section-title text-center mb-5">
                {!! $companyProfile->products_title !!}
            </div>
            @if (isset($ourProductImages) && count($ourProductImages))
                <div class="swiper pchpcl_products_range mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($ourProductImages as $ourProductImage)
                            <div class="swiper-slide">
                                <div class="product-range-box">
                                    @if (isset($ourProductImage->image) && $ourProductImage->image != null)
                                    <a href="{{route('front.product-details',['id'=>$ourProductImage->id])}}">
                                        <div class="img-box">
                                            <img src="{{ asset('storage/app/public/uploads/OurProductImage/image') . '/' . $ourProductImage->image }}"
                                                alt="">
                                        </div>
                                    </a>
                                    @endif
                                    <div class="product-range-content">
                                        <h5>Neuro</h5>
                                        <div class="sub-text-grid">{{ $ourProductImage->product_title }}</div>
                                        <p>{{ $ourProductImage->product_label }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            @endif

        </div>
    </section>

    <section class="meet-pchpcl-team-section">
        <div class="container">

            <div class="section-title text-center mb-5">
                {!! $companyProfile->pchpl_team_title !!}
            </div>
            @if (isset($PCHPLTeams) && count($PCHPLTeams))
                <div class="swiper pchpcl_team mt-3">

                    <div class="swiper-wrapper">
                        @foreach ($PCHPLTeams as $PCHPLTeam)
                            <div class="swiper-slide">
                                <div class="team-box">
                                    @if (isset($PCHPLTeam) && $PCHPLTeam->image != null)
                                        <div class="image-team">
                                            <img src="{{ asset('storage/app/public/uploads/pchplteam/image') . '/' . $PCHPLTeam->image }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    @endif
                                    <div class="inner-team-contant">
                                        <h5>{{ $PCHPLTeam->name }}</h5>
                                        <p>{{ $PCHPLTeam->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            @endif
        </div>
    </section>

    @if (isset($proudMember) && count($proudMember))

    <section class="member-section">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>We are proud member of</h2>
            </div>
    
            <div class="proud-member-slider-sec-main">
                <div class="swiper partner_member mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($proudMember as $proudmembers)
                            <div class="swiper-slide">
                                <div class="img-logo-box-partner">
                                    <img src="{{ URL::asset('storage/app/public/uploads/ProudMembers') }}/{!! isset($proudmembers->image) ? '/' . $proudmembers->image : '' !!}"
                                        class="img-fluid ">
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <div class="swiper-button-next hide-btn"></div>
                <div class="swiper-button-prev hide-btn"></div>
                <div class="swiper-pagination hide-btn"></div>
                </div>
            </div>
        </div>
    </section>
    @endif


    @include('Front.Layout.becomefranchoer_popup')

@endsection
