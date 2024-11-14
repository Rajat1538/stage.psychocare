@extends('Front.Layout.master-layout')
@section('content')
    @if (isset($directors) && count($directors))
        <section class="mr-supreet-singh-section mt-0">
            <div class="backhround-light-green py-5">

                <div class="container">
                    @foreach ($directors as $key => $director)
                        @if ($key % 2 == 0)
                            <div class="row align-items-center mb-5">
                                @if (isset($director->image) && $director->image != null)
                                    <div class="col-md-5 mb-3 mb-lg-0">
                                        <div class="radius_img_directer">
                                            <img src="{{ URL::asset('storage/app/public/uploads/Directors') }}/{{ $director->image }}"
                                            class="img-fluid w-100" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-7">
                                    <div class="man-details-ceo">

                                        <div class="section-title text-center text-lg-start text-md-start">
                                            <h1>{{ $director->name }}</h1>
                                        </div>

                                        <div class="sub-text-green text-center text-lg-start text-md-start">
                                            {{ $director->designation }}</div>
                                        <div class="social-media-direction mb-3 ">
                                            <ul
                                                class="d-flex justify-content-center justify-content-lg-start justify-content-md-start">
                                                @if (isset($director->insta_link) && $director->insta_link != null)
                                                    <li class="me-3">
                                                        <a target="_blank" href="{{ $director->insta_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/instagram.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (isset($director->fb_link) && $director->fb_link != null)
                                                    <li class="me-3">
                                                        <a target="_blank" href="{{ $director->fb_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/facebook.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (isset($director->twitter_link) && $director->twitter_link != null)
                                                    <li class="me-3">
                                                        <a target="_blank" href="{{ $director->twitter_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/twitter.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (isset($director->linkedin_link) && $director->linkedin_link != null)
                                                    <li class="me-3">
                                                        <a target="_blank" href="{{ $director->linkedin_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/linkedin.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (isset($director->youtube_link) && $director->youtube_link != null)
                                                    <li>
                                                        <a target="_blank" href="{{ $director->youtube_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/you.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="paragraph-wrapper">
                                            {!! $director->description !!}
                                        </div>

                                        {{-- <div class="text-center text-lg-start text-md-start">
                                            <a href="" class="btn button-dark mt-3">Read More</a>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row align-items-center mb-5">

                                <div class="col-md-7 order-1 order-md-0 order-lg-0">
                                    <div class="man-details-ceo">

                                        <div class="section-title text-center text-lg-start text-md-start">
                                            <h1>{{ $director->name }}</h1>
                                        </div>

                                        <div class="sub-text-green text-center text-lg-start text-md-start">
                                            {{ $director->designation }}</div>
                                        <div class="social-media-direction mb-3 ">
                                            <ul
                                                class="d-flex justify-content-center justify-content-lg-start justify-content-md-start">
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
                                                        <a target="_blank" href="{{ $director->linkedin_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/link.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (isset($director->youtube_link) && $director->youtube_link != null)
                                                    <li>
                                                        <a target="_blank" href="{{ $director->youtube_link }}">
                                                            <img src="{{ URL::asset('resources/front-asset/images/you.svg') }}"
                                                                class="rounded-0" />
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="paragraph-wrapper">
                                            {!! $director->description !!}
                                        </div>

                                        {{-- <div class="text-center text-lg-start text-md-start">
                                            <a href="" class="btn button-dark mt-3">Read More</a>
                                        </div> --}}

                                    </div>
                                </div>
                                @if (isset($director->image) && $director->image != null)
                                    <div class="col-md-5 mb-3 mb-lg-0 ">
                                        <div class="radius_img_directer">
                                            <img src="{{ URL::asset('storage/app/public/uploads/Directors') }}/{{ $director->image }}"
                                            class="img-fluid w-100" alt="">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach

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
                            <a href="{{ $companyProfile->mission_button_url }}"
                            class="btn button-dark mt-3">{{ $companyProfile->mission_button_title }}</a>
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

        </div>
    </section>
    @if (isset($achievements) && count($achievements))
        <section class="achievement-awards-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-title mt-md-0 mb-3 mt-3 text-center">
                            <h2>{!! $titleDes->title !!}</h2>
                        </div>

                        <div class="paragraph-wrapper text-center">
                            <p>{!! $titleDes->description !!}</p>
                        </div>

                        <div class="achievement-awards-grid mt-5">
                            <div class="row">
                                @foreach ($achievements as $achievement)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="award-box">
                                            <div class="row align-items-lg-center">
                                                @if (isset($achievement->image) && $achievement->image != null)
                                                    <div class="col-md-12 col-lg-5">
                                                        <img src="{{ asset('storage/app/public/uploads/achievements/image') . '/' . $achievement->image }}"
                                                            class="img-fluid w-100" alt="">
                                                    </div>
                                                @endif
                                                <div class="col-md-12 col-lg-7 m-lg-0 m-md-2 ">
                                                    {!! $achievement->title !!}
                                                    {!! $achievement->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (isset($manageAwards) && count($manageAwards))
        <section class="award">
            <div class="container">
                <div class="text-center mb-4">

                    <div class="section-title">
                        <h2>PCHPL - Awards</h2>
                    </div>
                </div>

                <div class="row">
                    @foreach ($manageAwards as $manageAward)
                        <div class="col-lg-4 col-md-6 mt-4">
                            @if (isset($manageAward->image) && $manageAward->image != null)
                                <div class="award-img-box">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/app/public/uploads/awards') . '/' . $manageAward->image }}"
                                        alt="">
                                </div>
                            @endif
                            <div class="award-content">
                                {!! $manageAward->title !!}
                                {!! $manageAward->description !!}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
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
    
                    <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </div>
    </section>
@endif

@include('Front.Layout.becomefranchoer_popup')
<script>
document.addEventListener('DOMContentLoaded', function() {
            var headings = document.querySelectorAll('h5');
            headings.forEach(function(heading) {
                heading.classList.add('mt-1');
            });
        });
</script>
@endsection
