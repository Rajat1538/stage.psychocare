@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

<section class="sub-header-main mt-0">
    <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/privacypolicy') }}/{{isset($banner->banner_image) ? $banner->banner_image : ''}}');">
        <div class="container @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-content-none @endif">
            <div class="sub-inner-conent">
                {!!isset($banner->banner_title) ? $banner->banner_title : ''!!}
                {!!isset($banner->banner_description) ? $banner->banner_description : ''!!}
            </div>
        </div>
    </div>
</section>


<section class="privacy-policy">
    <div class="container">
       
        {!!isset($content->privacyPolicy_page_content) ? $content->privacyPolicy_page_content : ''!!}
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

                <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>
</section>


@include('Front.Layout.becomefranchoer_popup')


@endsection