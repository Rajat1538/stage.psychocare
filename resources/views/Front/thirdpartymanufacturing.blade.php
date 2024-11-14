@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
    <!--=============== Page Header start ===========-->
    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($banner->title) && $banner->title != null || isset($banner->description) && $banner->description != null) @else background-none @endif"style="background-image: url('{{ URL::asset('storage/app/public/uploads/thirdpartymanufacturingbanner') }}/{{ isset($banner->image) ? $banner->image : '' }}');">
            <div class="container  @if(isset($banner->title) && $banner->title != null || isset($banner->description) && $banner->description != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! isset($banner->title) ? $banner->title : '' !!}
                    {!! isset($banner->description) ? $banner->description : '' !!}
                </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="">
        <div class="container ">
            <div class="row d-md-flex align-items-center justify-content-between">
                <div class="col-md-5">

                    <div class="section-title product-tagline text-center  mt-md-0 mt-3">
                        <h1>700+ Product <br> Approved</h1>
                    </div>

                </div>
                <div class="col-md-2 justify-content-center d-lg-flex d-none">
                    <img src="{{ URL::asset('resources/front-asset/images/seprator.png') }}" class="img-fluid">
                </div>
                <div class="col-md-5 text-center">

                    <div class="section-title mt-md-0 mt-3">
                        <h2>Our Quality Assurances</h2>
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        @php $counter=0; @endphp
                        @foreach ($qualityassurances as $qualityassurance)
                            <div class="col-md-6 col-6 col-lg-4 text-center">

                                <img src="{{ URL::asset('storage/app/public/uploads/qualityassurance/image') }}/{!! isset($qualityassurance->image) ? $qualityassurance->image : '' !!}"
                                    class="img-fluid">
                            </div>
                            @php $counter++; @endphp
                        @endforeach




                    </div>
                </div>

            </div>
            <div class="row align-items-center d-md-flex section-space">
                <div class="col-md-6  ">
                    <img src="{{ URL::asset('storage/app/public/uploads/manufacturing_image') }}/{!! isset($banner->manufacturing_image) ? $banner->manufacturing_image : '' !!}"
                        class="img-fluid h-100 w-100 ">
                </div>
                <div class="col-md-6 order-md-0 order-1">

                    <div class="section-title mt-md-0 mt-3 mb-2">
                        {!! isset($banner->manufacturing_title) ? $banner->manufacturing_title : '' !!}
                    </div>
                    {!! isset($banner->manufacturing_description) ? $banner->manufacturing_description : '' !!}

                    <!-- <a  href="{{-- {{ route('get.inquiry.form') }} --}}" class="btn button-dark mt-3">Send Enquiry</a> -->
                    <a  data-bs-toggle="modal" class="btn button-dark mt-3"
                                    data-bs-target=".inquiryPopup" role="button">Send Enquiry</a>

                </div>

            </div>



        </div>
    </section>


    <section class="stats-section">
        <div class="container">

            <div class="section-title-light text-center mb-5">
                {!! $franchise->journey_title ?? '' !!}
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8 col-sm-12 col-12">

                    <div class="d-sm-flex justify-content-between text-center">
                        <div class="mx-2">
                            <h2>{!! isset($franchise->journey_customers) ? $franchise->journey_customers : '' !!}</h2>
                            <p>Customers</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($franchise->journey_manufacturing_facilities) ? $franchise->journey_manufacturing_facilities : '' !!}</h2>
                            <p>Manufacturers</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($franchise->journey_sku) ? $franchise->journey_sku : '' !!}</h2>
                            <p>SKU's</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($franchise->journey_employees) ? $franchise->journey_employees : '' !!}</h2>
                            <p>Employees</p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ $franchise->journey_button_url ?? '' }}" class="btn button-light-big mt-3">{{ $franchise->journey_button_title ?? '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="PCD-section">
        <div class="container">

            <div class="section-title text-center">
                <h2>Manufacturing Perks with Us</h2>
            </div>
            <div class="swiper PCD_slider mt-4">
                <div class="swiper-wrapper">
                    @foreach ($benefits as $benefit)
                        <div class="swiper-slide">
                            <div class="PCD-concerns">
                                <div class="image-PCD">
                                    <img src="{{ URL::asset('storage/app/public/uploads/thirdpartymanufacturingbenefits') }}/{!! isset($benefit->image) ? $benefit->image : '' !!}"
                                        alt="">
                                </div>
                                <div class="inner-content_logo-slider">
                                    {!! isset($benefit->title) ? $benefit->title : '' !!}
                                    {!! isset($benefit->description) ? $benefit->description : '' !!}
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


    <section class="testimonial-section mb-5 d-none d-md-block">
        <div class="container">

            <div class="section-title text-center">
                <h2>Client Success Stories</h2>
            </div>

            <div class="paragraph-wrapper text-center mt-0 mb-5">
                <p>Testimonials from Our Clients</p>
            </div>
            <div class="swiper testimonial mt-4">
                <div class="swiper-wrapper">
                    @foreach ($clientReview as $review)
                        <div class="swiper-slide">
                            <div class="review-box">

                                <div class="row align-items-center">
                                    <!-- <div class="col-md-5">
                                        <img src="{{ URL::asset('storage/app/public/uploads/ClientReviews') }}/{{ isset($review['image']) ? $review['image'] : '' }}"
                                            class="img-fluid w-100">
                                    </div> -->
                                    <div class="col-md-12 mx-auto">
                                        <div class="review-content">
                                            <img src="{{ URL::asset('resources/front-asset/images/quote.png') }}"
                                                class="img-fluid">
                                            {!! $review['description'] !!}
                                            <h4>{!! $review['name'] !!}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="margin-resp-0 our_production_part_2_main">
      <div class="container">
        <div class="section-title text-center">
          <h2>
            Our production base is divided into
            <br />
            the following units
          </h2>
        </div>

        <!--  -->
        <div class="my-4">
          <div class="swiper trusted_manufacturing-2 d-block d-md-none">
            <div class="swiper-wrapper mb-4">
              
            @foreach ($dividedunits as $dividedunit)
            <div class="swiper-slide">

                <a class="new-launch-card">
                    <div class="image-division">
                        <img src="{{ URL::asset('storage/app/public/uploads/ProductionDividedUnit') }}/{!! isset($dividedunit->image) ? $dividedunit->image : '' !!}"
                            alt="" class="img-fluid w-100">
                    </div>
                    {!! isset($dividedunit->title) ? $dividedunit->title : '' !!}
                    {!! isset($dividedunit->description) ? $dividedunit->description : '' !!}
                </a>
            </div>
            @endforeach
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
        <!--  -->

        <div class="d-none d-md-block">

        <div class="row my-0 my-md-4">

                @foreach ($dividedunits as $dividedunit)
                    <div class="col-md-4 col-sm-6 col-12">
                        <a class="new-launch-card">
                            <div class="image-division">
                                <img src="{{ URL::asset('storage/app/public/uploads/ProductionDividedUnit') }}/{!! isset($dividedunit->image) ? $dividedunit->image : '' !!}"
                                    alt="" class="img-fluid w-100">
                            </div>
                            {!! isset($dividedunit->title) ? $dividedunit->title : '' !!}
                            {!! isset($dividedunit->description) ? $dividedunit->description : '' !!}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
    </section>

    <section class="product-section">
        <div class="container">
            <div class="row align-items-center d-md-flex">
                <div class="col-lg-4 col-12">

                    <div class="section-title mt-md-0 mt-0 mt-md-3 mb-2">
                        {!! isset($dealwithrange->title) ? $dealwithrange->title : '' !!}
                    </div>
                    {!! isset($dealwithrange->description) ? $dealwithrange->description : '' !!}
                    <a class="btn button-dark mt-3 mb-lg-0 mb-4">Send Enquiry</a>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="swiper testimonial mt-4">
                        <div class="swiper-wrapper">
                            <!-- Chunk the collection into groups of 4 -->
                            @foreach ($dealwithrangeimages->chunk(4) as $chunk)
                                <div class="swiper-slide">
                                    <div class="review-box">
                                        <div class="row">
                                            <!-- Iterate through each group -->
                                            @foreach ($chunk as $dealwithrangeimage)
                                                <div class="col-md-6 col-sm-6 col-6"> <!-- Adjust the column sizes here -->
                                                    <div class="product-box">
                                                        <img src="{{ URL::asset('storage/app/public/uploads/dealwithrangeimage') }}/{!! isset($dealwithrangeimage->image) ? $dealwithrangeimage->image : '' !!}"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="paragraph-wrapper-semibold text-center mb-4">
                                                        {!! isset($dealwithrangeimage->title) ? $dealwithrangeimage->title : '' !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- AWARD SECTION HTML -->

<section class="award slider-position-relative">
      <div class="container">
        <div class="section-title text-center mb-3">
          <h2>Certificate</h2>
        </div>

        <!--  -->
        <div class="d-block d-md-none">
          <div class="swiper certificate_after">
            <div class="swiper-wrapper mb-4">
              
                @foreach ($certificates as $certificate)
                    <div class="swiper-slide">
                        <div class="award-certificate">
                            <a data-fancybox="gallery"  href="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}"  >
                                <img src="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                  
                    @endforeach
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
           
          </div>
        </div>
        <!--  -->

        <div class="d-none d-md-block">
          <div class="row">
            @foreach ($certificates as $certificate)
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="swiper-slide">
                    <div class="award-certificate">
                        <a data-fancybox="gallery"  href="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}"  >
                            <img src="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
             </div>
            @endforeach
          </div>
        </div>
        <div class="text-center">
          <a href="#" class="btn button-dark mt-3">Load More</a>
        </div>
      </div>
    </section>


    <!-- {{-- <section class="launch-section">
        <div class="section-title-light mt-md-0 mt-3">
            <h2>Empower Your Business with us <br> Start Your PCD Pharma Franchise Journey Now!</h2>
        </div>
        <div class="text-center">
            <a href="" class="btn button-light-big mt-3">Let's Talk</a>
        </div>
    </section> --}} -->
    @include('Front.Layout.letstalk_popup')


    @include('Front.Layout.level_up_form')

    @include('Front.Layout.inquiryPopup')

    <section class="member-section">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>We are proud member of</h2>
            </div>
    
            <div class="proud-member-slider-sec-main">
                <div class="swiper partner_member mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($proudmember as $proudmembers)
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            let nextPage = 2; // As page 1 is already loaded
            $('#loadMoreCertificates').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('front.third-party-manufacturing') }}?page=' + nextPage,
                    type: 'GET',
                    data: 'certificate=certificate',
                    success: function(response) {
                        if (response) {
                            $('#certificate-wrapper').append(response);
                            nextPage++;
                        } else {
                            $('#loadMoreCertificates').hide();
                        }
                    }
                });
            });

            var swiper = new Swiper(".certificate_after", {
            spaceBetween: 30,
            slidesPerView: 3,
            // loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            // pagination: {
            //   el: ".swiper-pagination",
            // },
            breakpoints: {
                0: {
                slidesPerView: 1,
                spaceBetween: 10,
                },
                300: {
                slidesPerView: 1,
                spaceBetween: 10,
                },
                575: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
                768: {
                slidesPerView: 3,
                spaceBetween: 30,
                },
                1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                },
            },
            });

            var swiper = new Swiper(".trusted_manufacturing-2", {
            spaceBetween: 30,
            slidesPerView: 3,
            // loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            // pagination: {
            //   el: ".swiper-pagination",
            // },
            breakpoints: {
                0: {
                slidesPerView: 1,
                spaceBetween: 10,
                },
                300: {
                slidesPerView: 1,
                spaceBetween: 10,
                },
                575: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
                768: {
                slidesPerView: 3,
                spaceBetween: 30,
                },
                1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                },
            },
            });
        });
    </script>
@endsection
