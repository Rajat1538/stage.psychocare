@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

<section class="sub-header-main mt-0">
    <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/eventPage/banner_image') }}/{!!isset($banner->banner_image) ? $banner->banner_image : ''!!}');">
        <div class="container @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-content-none @endif">
            <div class="sub-inner-conent">
                {!!isset($banner->banner_title) ? $banner->banner_title : ''!!}
                {!!isset($banner->banner_description) ? $banner->banner_description : ''!!}
            </div>
        </div>
    </div>
</section>
<!--=============== Page Header start END ===========-->

<section class="event-content mb-4">
    <div class="container">
        @foreach ($details as $detail)
       
        <div class="section-title">
            {!!isset($detail->title) ? $detail->title : ''!!}
        </div>
        {!!isset($detail->description) ? $detail->description : ''!!}
        
            @endforeach
    </div>
</section>

<section class="event-images mt-0">
    <div class="container">
        <div class="row">
            @foreach ($eventimages as $eventImage)
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                        <img src="{{ URL::asset('storage/app/public/uploads/eventimage/image') }}/{!!isset($eventImage->image) ? '/'.$eventImage->image : ''!!}" class="img-fluid w-100 ">

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

@endsection