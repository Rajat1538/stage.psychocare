@extends('Front.Layout.master-layout')
@section('styles')
    @php
        $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
        if (isset($corporateOfficeTour->banner_image) && $corporateOfficeTour->banner_image != null) {
            $mainImageUrl =
                asset('storage/app/public/uploads/corporateofficetour/banner_image') .
                '/' .
                $corporateOfficeTour->banner_image;
        }
    @endphp
    <style>
        .sub-header-main .background-sub {
            background-image: url({{ $mainImageUrl }})
        }
    </style>
@endsection
@section('content')
    <!--=============== Page Header start ===========-->

    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($corporateOfficeTour->banner_title) && $corporateOfficeTour->banner_title != null || isset($corporateOfficeTour->banner_description) && $corporateOfficeTour->banner_description != null) @else background-none @endif">
            <div class="container @if(isset($corporateOfficeTour->banner_title) && $corporateOfficeTour->banner_title != null || isset($corporateOfficeTour->banner_description) && $corporateOfficeTour->banner_description != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!!isset($corporateOfficeTour->banner_title) ? $corporateOfficeTour->banner_title : ''!!}
                {!!isset($corporateOfficeTour->banner_description) ? $corporateOfficeTour->banner_description : ''!!}
                </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="welcome-pchpl-viadeo">
        <div class="container">
            <div class="row align-items-center d-md-flex section-space">
                <div class="col-md-6">
                    <div class="video-wrapper">
                        <div class="video-container" id="video-container">
                            {{-- <video controls id="video" preload="metadata" height="500px">
                                <source src="{{ URL::asset('resources/front-asset/images/video.mp4') }}" type="video/mp4">
                            </video> --}}
                            <iframe width="100%" src="{{isset($corporateOfficeTour->welcome_video_url) ? $corporateOfficeTour->welcome_video_url : '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                            {{-- <div class="play-button-wrapper">
                                <div title="Play video" class="play-gif" id="circle-play-b">
                                    <!-- SVG Play Button -->
                                    <img src="{{ URL::asset('resources/front-asset/images/viadeo-play') }}-icon.png" alt="">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="section-title mt-md-0 mt-3">
                        {!!isset($corporateOfficeTour->welcome_title) ? $corporateOfficeTour->welcome_title : ''!!}
                    </div>
                    <div class="paragraph-wrapper">
                {!!isset($corporateOfficeTour->welcome_description) ? $corporateOfficeTour->welcome_description : ''!!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="corporate-office-tour-section">
        <div class="container">
            <div class="section-title text-center">
                <h2>PCHPL - Corporate Office Tour</h2>
            </div>
            <div class="taband-accord-tour-images">
                <ul class="nav nav-tabs d-none d-lg-flex justify-content-center mb-5 border-0" id="myTab"
                    role="tablist">
                    @if (isset($allCorporateOfficeTourImages) && count($allCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-image-tab" data-bs-toggle="tab"
                                data-bs-target="#all-image-tab-pane" type="button" role="tab"
                                aria-controls="all-image-tab-pane" aria-selected="true">All</button>
                        </li>
                    @endif
                    @if (isset($officeCorporateOfficeTourImages) && count($officeCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="office-tab" data-bs-toggle="tab" data-bs-target="#office-tab-pane"
                                type="button" role="tab" aria-controls="office-tab-pane"
                                aria-selected="false">Office</button>
                        </li>
                    @endif
                    @if (isset($catalogueCorporateOfficeTourImages) && count($catalogueCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="catalogue-tab" data-bs-toggle="tab"
                                data-bs-target="#catalogue-tab-pane" type="button" role="tab"
                                aria-controls="catalogue-tab-pane" aria-selected="false">Catalogue</button>
                        </li>
                    @endif
                    @if (isset($certificateCorporateOfficeTourImages) && count($certificateCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="certificate-tab" data-bs-toggle="tab"
                                data-bs-target="#certificate-tab-pane" type="button" role="tab"
                                aria-controls="certificate-tab-pane" aria-selected="false">Certificate</button>
                        </li>
                    @endif
                    @if (isset($gamesCorporateOfficeTourImages) && count($gamesCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="games-tab" data-bs-toggle="tab" data-bs-target="#games-tab-pane"
                                type="button" role="tab" aria-controls="games-tab-pane"
                                aria-selected="false">Games</button>
                        </li>
                    @endif
                    @if (isset($prizeCorporateOfficeTourImages) && count($prizeCorporateOfficeTourImages))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="prize-tab" data-bs-toggle="tab" data-bs-target="#prize-tab-pane"
                                type="button" role="tab" aria-controls="prize-tab-pane"
                                aria-selected="false">Award</button>
                        </li>
                    @endif
                </ul>
                <div class="tab-content accordion" id="myTabContent">
                    @if (isset($allCorporateOfficeTourImages) && count($allCorporateOfficeTourImages))
                        <div class="tab-pane fade show active accordion-item border-0" id="all-image-tab-pane"
                            role="tabpanel" aria-labelledby="all-image-tab" tabindex="0">

                            <div class="accordion-header d-lg-none" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">All</button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block"
                                aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($allCorporateOfficeTourImages as $allCorporateOfficeTourImage)
                                                @if (isset($allCorporateOfficeTourImage->image))
                                                    <div class="col-lg-4 col-sm-6 col-md-4">
                                                        <div class="img-tour-box">
                                                            <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $allCorporateOfficeTourImage->image }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    @if (isset($officeCorporateOfficeTourImages) && count($officeCorporateOfficeTourImages))
                        <div class="tab-pane fade accordion-item border-0" id="office-tab-pane" role="tabpanel"
                            aria-labelledby="office-tab" tabindex="0">
                            <div class="accordion-header d-lg-none" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Office
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse d-lg-block"
                                aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($officeCorporateOfficeTourImages as $officeCorporateOfficeTourImage)
                                            @if (isset($officeCorporateOfficeTourImage->image))
                                                <div class="col-lg-4 col-sm-6 col-md-4">
                                                    <div class="img-tour-box">
                                                        <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $officeCorporateOfficeTourImage->image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($catalogueCorporateOfficeTourImages) && count($catalogueCorporateOfficeTourImages))
                        <div class="tab-pane fade accordion-item border-0" id="catalogue-tab-pane" role="tabpanel"
                            aria-labelledby="catalogue-tab" tabindex="0">
                            <div class="accordion-header d-lg-none" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Catalogue
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse d-lg-block"
                                aria-labelledby="headingThree" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($catalogueCorporateOfficeTourImages as $catalogueCorporateOfficeTourImage)
                                            @if (isset($catalogueCorporateOfficeTourImage->image))
                                                <div class="col-lg-4 col-sm-6 col-md-4">
                                                    <div class="img-tour-box">
                                                        <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $catalogueCorporateOfficeTourImage->image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($certificateCorporateOfficeTourImages) && count($certificateCorporateOfficeTourImages))
                        <div class="tab-pane fade accordion-item border-0" id="certificate-tab-pane" role="tabpanel"
                            aria-labelledby="certificate-tab" tabindex="0">
                            <div class="accordion-header d-lg-none" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Certificate
                                </button>
                            </div>
                            <div id="collapseFour" class="accordion-collapse collapse d-lg-block"
                                aria-labelledby="headingFour" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($certificateCorporateOfficeTourImages as $certificateCorporateOfficeTourImage)
                                                @if (isset($certificateCorporateOfficeTourImage->image))
                                                    <div class="col-lg-4 col-sm-6 col-md-4">
                                                        <div class="img-tour-box">
                                                            <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $certificateCorporateOfficeTourImage->image }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($gamesCorporateOfficeTourImages) && count($gamesCorporateOfficeTourImages))
                        <div class="tab-pane fade accordion-item border-0" id="games-tab-pane" role="tabpanel"
                            aria-labelledby="games-tab" tabindex="0">
                            <div class="accordion-header d-lg-none" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Games
                                </button>
                            </div>
                            <div id="collapseFive" class="accordion-collapse collapse d-lg-block"
                                aria-labelledby="headingFive" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($gamesCorporateOfficeTourImages as $gamesCorporateOfficeTourImage)
                                            @if (isset($gamesCorporateOfficeTourImage->image))
                                                <div class="col-lg-4 col-sm-6 col-md-4">
                                                    <div class="img-tour-box">
                                                        <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $gamesCorporateOfficeTourImage->image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($prizeCorporateOfficeTourImages) && count($prizeCorporateOfficeTourImages))
                        <div class="tab-pane fade accordion-item border-0" id="prize-tab-pane" role="tabpanel"
                            aria-labelledby="prize-tab" tabindex="0">
                            <div class="accordion-header d-lg-none" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Prize
                                </button>
                            </div>
                            <div id="collapseSix" class="accordion-collapse collapse d-lg-block"
                                aria-labelledby="headingSix" data-bs-parent="#myTabContent">
                                <div class="accordion-body">
                                    <div class="image-tab-grid">
                                        <div class="row justify-content-center justify-content-lg-start">
                                            @foreach ($prizeCorporateOfficeTourImages as $prizeCorporateOfficeTourImage)
                                            @if (isset($prizeCorporateOfficeTourImage->image))
                                                <div class="col-lg-4 col-sm-6 col-md-4">
                                                    <div class="img-tour-box">
                                                        <img src="{{ asset('storage/app/public/uploads/corporateofficetourimage/image') . '/' . $prizeCorporateOfficeTourImage->image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="map-information-main">
        <div class="container">
            <div class="row align-items-md-center">
                <div class="col-lg-6 col-md-6 maps_parent">
                    <!-- <img src="{{ URL::asset('resources/front-asset/images/map.png') }}" class="img-fluid w-100" alt=""> -->
                 {!!isset($corporateOfficeTour->office_map_iframe) ? $corporateOfficeTour->office_map_iframe : ''!!}
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="section-title mb-4 mt-4 mt-lg-0">
                        <h2>Corporate Office Address</h2>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ URL::asset('resources/front-asset/images/location.svg') }}" alt=""
                            class="me-3 img-fluid">
                            
                        <p>{!!isset($corporateOfficeTour->office_location) ? $corporateOfficeTour->office_location : ''!!}</p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ URL::asset('resources/front-asset/images/call.svg') }}" alt=""
                            class="me-3 img-fluid">
                        <a href="tel:+91{{ !!isset($corporateOfficeTour->office_phone) ? $corporateOfficeTour->office_phone :'' }}" target="_blank">
                            <p>{{ !!isset($corporateOfficeTour->office_phone) ? $corporateOfficeTour->office_phone :'' }}</p>
                        </a>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ URL::asset('resources/front-asset/images/website.svg') }}" alt=""
                            class="me-3 img-fluid">
                        <a href="https://{{ !!isset($corporateOfficeTour->office_website) ? $corporateOfficeTour->office_website : ''}}" target="_blank">
                            <p>{{ !!isset($corporateOfficeTour->office_website) ? $corporateOfficeTour->office_website : '' }}</p>
                        </a>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ URL::asset('resources/front-asset/images/mail.svg') }}" alt=""
                            class="me-3 img-fluid">
                        <a href="mailto:{{ !!isset($corporateOfficeTour->office_email) ? $corporateOfficeTour->office_email : '' }}" target="_blank">
                            <p>{{ !!isset($corporateOfficeTour->office_email) ? $corporateOfficeTour->office_email : '' }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="meet-pchpcl-team-section">
        <div class="container">

            <div class="section-title text-center mb-5">
                Meet PCHPL Team
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
