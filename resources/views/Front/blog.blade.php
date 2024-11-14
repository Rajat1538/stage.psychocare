@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
@php
use Illuminate\Support\Str;
@endphp
    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif"
            style="background-image: url('{{ URL::asset('storage/app/public/uploads/blogpage/banner_image') }}/{!! isset($banner->banner_image) ? $banner->banner_image : '' !!}')">
            <div class="container @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! isset($banner->banner_title) ? $banner->banner_title : '' !!}
                    {!! isset($banner->banner_description) ? $banner->banner_description : '' !!} </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="blogs-sec-1-grid">
        <div class="container">
            <div class="row" id="blog-posts">
                @include('Front.blog-pagination', ['blogdetails' => $blogdetails])
            </div>
        </div>
    </section>

    <section class="blog-upcoming-events-main">
        <div class="container">
            <div class="section-title text-center mb-3">
                <h2>Events</h2>
            </div>
            <div class="swiper eventblogslider">
                <div class="swiper-wrapper">
                    @foreach ($upcomingevents as $upcomingevent)
                    <div class="swiper-slide">
                        <div class="box-event-slider">
                            <div class="latest-event-slid">
                            <img src="{{ URL::asset('storage/app/public/uploads/upcomingevents/image') }}/{!! isset($upcomingevent->image) ? $upcomingevent->image : '' !!}" class="img-fluid w-100" alt="">
                        </div>
                            <div class="background-gradiant-img"></div>
                            <div class="inner-text-slider">
                                {!! isset($upcomingevent->title) ? $upcomingevent->title : '' !!}
                                <div class="date-event-slider">{{ $upcomingevent->start_date ? \Carbon\Carbon::parse($upcomingevent->start_date)->format('d-m-Y') : 'No date available' }}</div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
                <div class="swiper-pagination"></div>
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
    @include('Front.Layout.becomefranchoer_popup')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pagination li a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(data) {
                        $('#blog-posts').html(data);
                    }
                });
            });
        });
    </script>
@endsection
