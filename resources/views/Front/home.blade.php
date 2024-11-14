@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
    <!--=============== Slider ===========-->
    <div class="slider-main mt-0">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($homeSlider as $item)
                    <div class="swiper-slide">
                        <div class="slider-inner-box  @if ((isset($item['title']) && $item['title'] != null) || (isset($item['description']) && $item['description'] != null)) @else background-none @endif"
                            style="background-image: url('{{ URL::asset('storage/app/public/uploads/HomeSliders') }}/{{ $item['image'] }}'); ">
                            <div class="container @if ((isset($item['title']) && $item['title'] != null) || (isset($item['description']) && $item['description'] != null)) @else background-content-none @endif">
                                <div class="content-slider">
                                    {!! isset($item['title']) ? $item['title'] : '' !!}
                                    <p>{!! isset($item['description']) ? substr($item['description'], 0, 200) : '' !!}</p>
                                    <!-- <a target="_blank" href="{{ $item['button_link'] }}"
                                        class="btn button-light">{{ $item['button_title'] }}</a> -->
                                        <a target="_blank" href="{{ $item['button_link'] }}" class="btn button-light">
                                            {{ isset($item['button_title']) ? $item['button_title'] : 'Download' }}
                                        </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-button-next min-sider-button-next"></div>
        <div class="swiper-button-prev min-sider-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
    <!--=============== Slider END ===========-->

    <section class="about-section">
        <div class="container">
            <div class="row align-items-center d-md-flex">
                <div class="col-md-6 text-center text-lg-start">
                    <img class="img-fluid h-100 w-100"
                        src="{{ URL::asset('storage/app/public/uploads/companybackground') }}/{{ $cbop->company_background_image ?? '' }}">
                </div>
                <div class="col-md-6">

                    <div class="section-title mt-md-0 mt-3">
                        {!! isset($cbop->company_background_title) ? $cbop->company_background_title : '' !!}
                    </div>

                    <div class="paragraph-wrapper">
                        {!! isset($cbop->company_background_description) ? $cbop->company_background_description : '' !!}
                    </div>

                    @if (isset($cbop))
                        <div class="text-center text-md-start text-lg-start">
                            <a href="{{ $cbop->company_background_button_link ?? '' }}"
                                class="btn button-dark mt-3">{{ $cbop->company_background_button_title ?? '' }}</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <section class="product-section">
        <div class="container">
            <div class="row align-items-center d-md-flex">
                <div class="col-lg-4 col-12">

                    <div class="section-title mt-md-0 mt-3 text-center text-lg-start">
                        <h2>Our Products</h2>
                    </div>

                    <div class="paragraph-wrapper">
                        <p>{!! isset($cbop->products_description) ? $cbop->products_description : '' !!}</p>
                    </div>

                    <div class="text-center text-lg-start">
                        <a href="{{ $cbop->products_button_link ?? '' }}"
                            class="btn button-dark mt-3 mb-lg-0 mb-4">{{ $cbop->products_button_title ?? '' }}</a>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-box">
                                <img src="{{ URL::asset('storage/app/public/uploads/companybackground/products/image_one') }}/{{ $cbop->image_one ?? '' }}"
                                    class="img-fluid">
                            </div>

                            <div class="paragraph-wrapper-semibold text-center mb-4">
                                <p>{{ $cbop->title_one }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-box">
                                <img src="{{ URL::asset('storage/app/public/uploads/companybackground/products/image_two') }}/{{ $cbop->image_two ?? '' }}"
                                    class="img-fluid">

                            </div>
                            <div class="paragraph-wrapper-semibold text-center mb-4">
                                <p>{{ $cbop->title_two }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-box">
                                <img src="{{ URL::asset('storage/app/public/uploads/companybackground/products/image_three') }}/{{ $cbop->image_three ?? '' }}"
                                    class="img-fluid">

                            </div>

                            <div class="paragraph-wrapper-semibold text-center mb-4">
                                <p>{{ $cbop->title_three }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-box">
                                <img src="{{ URL::asset('storage/app/public/uploads/companybackground/products/image_four') }}/{{ $cbop->image_four ?? '' }}"
                                    class="img-fluid">

                            </div>

                            <div class="paragraph-wrapper-semibold text-center mb-4">
                                <p>{{ $cbop->title_four }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="directors-section">
        <div class="container ">
            <div class="section-title text-center mt-md-0 mt-3">
                <h2>About our Directors</h2>
            </div>
            <div class="row justify-content-center mt-5">
                @foreach ($directors as $director)
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="director-div">
                            <div class="man-img-socialmedia">
                                <img src="{{ URL::asset('storage/app/public/uploads/Directors') }}/{{ $director['image'] }}"
                                    class="img-fluid">
                            </div>
                            <h3>{{ $director->name }}</h3>

                            <div class="paragraph-wrapper">
                                <p>{{ $director->designation }}</p>
                            </div>

                            <div class="social-media-direction mt-3 mb-4 mb-lg-0 ">
                                <ul class="d-flex justify-content-center">
                                    <li class="me-3">
                                        <a href="{{ $director->insta_link }}">
                                            <img src="{{ URL::asset('resources/front-asset/images/instagram.svg') }}"
                                                class="rounded-0" alt="">
                                        </a>
                                    </li>
                                    <li class="me-3">
                                        <a href="{{ $director->fb_link }}">
                                            <img src="{{ URL::asset('resources/front-asset/images/facebook.svg') }}"
                                                class="rounded-0" alt="">
                                        </a>
                                    </li>
                                    <li class="me-3">
                                        <a href="{{ $director->twitter_link }}">
                                            <img src="{{ URL::asset('resources/front-asset/images/twitter.svg') }}"
                                                class="rounded-0" alt="">
                                        </a>
                                    </li>
                                    <li class="me-3">
                                        <a href="{{ $director->linkedin_link }}">
                                            <img src="{{ URL::asset('resources/front-asset/images/link.svg') }}"
                                                class="rounded-0" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $director->youtube_link }}">
                                            <img src="{{ URL::asset('resources/front-asset/images/you.svg') }}"
                                                class="rounded-0" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="division-section">
        <div class="container">

            <div class="section-title-light text-start text-md-center">
                <h2>Our Division & Sister Concerns</h2>
            </div>
            <div class="swiper Division mt-4">
                <div id="adddivisioncls" class="swiper-wrapper">
                    <?php $addclass = 0; ?>
                    @foreach ($divisions as $division)
                        <?php $addclass++; ?>

                        <div class="swiper-slide">
                            <div class="division-box">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="division_image_height">
                                            <img src="{{ URL::asset('storage/app/public/uploads/Ourdivision') }}/{{ $division['image'] }}"
                                                class="img-fluid" alt="image not found">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="division-content">
                                            <h4>{!! $division['title'] !!}</h4>
                                            {!! $division['description'] !!}
                                        </div>
                                    </div>
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

    <section class="trusted-manufacturing-section">
        <div class="container">

            <div class="section-title text-center">
                <h2>Our Trusted Manufacturers</h2>
            </div>
            <div class="swiper trusted_manufacturing mt-3">
                <div class="swiper-wrapper">
                    @foreach ($tm as $item)
                        <div class="swiper-slide">
                            <div class="our-trusted-box">

                                <div class="image_review_profile">
                                    <img src="{{ URL::asset('storage/app/public/uploads/TrustedManufacturers') }}/{{ $item['image'] }}"
                                        alt="" class="profile-man">
                                </div>
                                {!! isset($item['name']) ? $item['name'] : '' !!}
                                <img src="{{ URL::asset('resources/front-asset/images/quite-icon.png') }}" alt=""
                                    class="quite-icon-img">
                                {!! isset($item['description']) ? substr($item['description'], 0, 300) : '' !!}

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

    <section class="testimonial-section mb-5 d-block d-md-block">
        <div class="container">

            <div class="section-title text-center">
                <h2>Our Clients says</h2>
            </div>
            <div class="swiper testimonial mt-4">
                <div class="swiper-wrapper">
                    @foreach ($clientReview as $review)
                        <div class="swiper-slide">
                            <div class="review-box">
                                <div class="row align-items-center">
                                    <!-- <div class="col-md-5">
                                        <div class="customers-testimonial-img">
                                            <img src="{{ URL::asset('storage/app/public/uploads/ClientReviews') }}/{{ isset($review['image']) ? $review['image'] : '' }}"
                                                class="img-fluid w-100">
                                        </div>
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

    @include('Front.Layout.becomefranchoer_popup')

    <section class="blogs-section">
        <div class="container">
            <div class="section-title text-center mb-md-5 mb-2 ">
                <h2>Latest Blog</h2>
            </div>
            <div class="row justify-content-center justify-content-lg-start">
                @foreach ($blog as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <a class="blog-div " href="{{ route('front.blog-details', ['id' => $post['id']]) }}">
                            <div class="latest-blog-img">
                                <img src="{{ URL::asset('storage/app/public/uploads/blogs/image') }}/{{ $post['image'] }}"
                                    class="img-fluid w-100">
                            </div>
                            <h4>{!! strlen($post['title']) > 100
                                ? strip_tags(substr($post['title'], 0, 100)) . '...'
                                : strip_tags($post['title']) !!}</h4>
                            <p>{!! strlen($post['description']) > 100
                                ? strip_tags(substr($post['description'], 0, 100)) . '...'
                                : strip_tags($post['description']) !!}</p>
                            <a class="btn button-dark"
                                href="{{ route('front.blog-details', ['id' => $post['id']]) }}">Read More</a>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @if ($blog->count() >= 6)
            <div class="text-center mt-4">
                <a href="{{ route('front.blog') }}" class="btn button-dark">View All</a>
            </div>
        @endif
    </section>

    <section class="blogs-section">
        <div class="container">
            <div class="section-title text-center mb-md-5 mb-2 ">
                <h2>Latest News</h2>
            </div>
            <div class="row justify-content-center justify-content-lg-start">
                @foreach ($news as $ln)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <a class="blog-div " href="{{ route('front.blog-details', ['id' => $ln['id']]) }}">
                            <div class="latest-blog-img">
                                <img src="{{ URL::asset('storage/app/public/uploads/blogs/image') }}/{{ $ln['image'] }}"
                                    class="img-fluid w-100">
                            </div>
                            <h4>{!! strlen($ln['title']) > 100 ? strip_tags(substr($ln['title'], 0, 100)) . '...' : strip_tags($ln['title']) !!}</h4>
                            <p>{!! strlen($ln['description']) > 100
                                ? strip_tags(substr($ln['description'], 0, 100)) . '...'
                                : strip_tags($ln['description']) !!}</p>
                            <a class="btn button-dark" href="{{ route('front.blog-details', ['id' => $ln['id']]) }}">Read
                                More</a>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @if ($news->count() >= 3)
            <div class="text-center mt-4">
                <a href="{{ route('front.latestNews') }}" class="btn button-dark">View All</a>
            </div>
        @endif
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-md-10 col-sm-12 col-12">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="text-center">
                                <h2>{!! $pcdFrenchise->journey_customers !!}</h2>
                                <p>Customers</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="text-center">
                                <h2>{!! $pcdFrenchise->journey_manufacturing_facilities !!}</h2>
                                <p>Manufacturers</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="text-center">
                                <h2>{!! $pcdFrenchise->journey_sku !!}</h2>
                                <p>SKU's</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="text-center">
                                <h2>{!! $pcdFrenchise->journey_employees !!}</h2>
                                <p>Employees</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="member-section mb-5">
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

    <script>
        var addclass = {{ $addclass }};
        if (addclass < 2) {
            $("#adddivisioncls").addClass("justify-content-center");
        }
    </script>
@endsection
