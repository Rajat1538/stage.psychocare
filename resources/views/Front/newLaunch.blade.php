@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

    <!--=============== Page Header start ===========-->
    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($banner['banner_title']) && $banner['banner_title'] != null || isset($banner['banner_description']) && $banner['banner_description'] != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/newlaunch') }}/{{ isset($banner['banner_image']) ? $banner['banner_image'] : '' }}');">
            <div class="container @if(isset($banner['banner_title']) && $banner['banner_title'] != null || isset($banner['banner_description']) && $banner['banner_description'] != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! isset($banner['banner_title']) ? $banner['banner_title'] : '' !!}
                    {!! isset($banner['banner_description']) ? $banner['banner_description'] : '' !!}
                    {{-- <h1>{!! $banner['banner_title'] !!}</h1>
                    <p>{!! $banner['banner_description'] !!}</p> --}}

                </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="banner-catlog-download-section position-relative">
        <div class="container">

            <div class="swiper newaunch_catlog">
                <div class="swiper-wrapper">
                    @foreach($newProductLaunchBanner as $nplb)
                        <div class="swiper-slide">
                            <div class="catlog-banner">
                                <div class="catalouge_slider_image_fix">
                                    <img src="{{ URL::asset('storage/app/public/uploads/newlaunch') }}/{{ isset($nplb->image) ? $nplb->image :'' }}" class="w-100 img-fluid" alt="">
                                </div>
                                <div class="overlay-background"></div>
                                <div class="catlog-button-download">
                                    <!-- <a href="">Download Catalogue</a> -->
                                    <a  data-bs-toggle="modal"
                                    data-bs-target=".broucher-form" role="button">Download
                                        Catalogue</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- Popup Download Form -->

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                            <div class="section-title">
                                <h5>Your Info</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="broucher-download-popup-form">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Enter Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn button-dark" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 ">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-submit-message-popup text-center mb-4">

                                <img src="images/success-message-submit.svg" class="" alt="">

                                <div class="paragraph-wrapper mt-4">
                                    <p><b> Wake Up Fresh</b> catalogue download
                                        successfully.</p>
                                </div>

                            </div>

                        </div>
                        <!-- <div class="modal-footer">
                            <button class="btn button-dark" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Back to first</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first
                modal</a> -->

            <!--  -->
        </div>
    </section>

    <section class="introducing-new-products-section">
        <div class="container">
            <div class="section-title mb-4 mt-3 text-center text-md-start text-lg-start">
                <h2>Introducing our New Products</h2>
            </div>
            <div class="row">
                @foreach($newProduct as $np)
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="box-new-products">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-4 mb-3 mb-sm-0">
                                    <div class="new-launch-img-product">
                                        <img src="{{ URL::asset('storage/app/public/uploads/newlaunch') }}/{{isset($np->image) ? $np->image :'' }}" class="w-100 img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-8">
                                    {!! isset($np['title']) ? $np['title'] : '' !!}
                                    {!! isset($np['description']) ? $np['description'] : '' !!}

                                    {{-- <h5>{!! $np['title'] !!}</h5>
                                    <p>{!! $np['description'] !!}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="division-section skin-care-slider">
        <div class="container">
            <div class="swiper skin_care mt-4">
                <div class="swiper-wrapper">
                    @foreach($newProductLaunch as $nl)
                        <div class="swiper-slide">
                            <div class="box-skin-care-box">
                                <div class="division_image_catalouge">
                                    <img src="{{ URL::asset('storage/app/public/uploads/newlaunch') }}/{{ $nl->thumb_image }}" class="w-100 img-fluid" alt="">
                                </div>
                                <div class="background-shadow-overlay"></div>
                                <div class="details-skin-care">
                                    <h4>{!! $nl['title'] !!}</h4>
                                    <p>{!! $nl['description'] !!}</p>
                                    <a type="button" class="btn btn-skin-care" data-bs-toggle="modal"
                                    data-bs-target=".broucher-form">
                                        Download Catalogue
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

    </section>

    <section class="newly-launched-products-section">
        <div class="container">

            <div class="section-title mb-4">
                <h2>Newly launched Products</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($ourProduct as $op)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="newly-launch-box">
                            <div class="new_launch_image_size">
                                <img src="{{ URL::asset('storage/app/public/uploads/OurProductImage/image') }}/{{ $op->image }}" class="w-100 img-fluid" alt="">
                            </div>
                            <h5>{!! $op['product_title'] !!}</h5>
                            <p>Packaging Type : <span>{!! $op['packing_type'] !!}</span></p>
                            <p>Packaging Size : <span>{!! $op['packing_size'] !!}</span></p>
                            <a href="{{ route('front.new-launch-details', ['id' => $op->id]) }}">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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

    @include('Front.Layout.becomefranchoer_popup')

    @endsection
