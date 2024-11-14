@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

<section class="sub-header-main mt-0">
    <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/terms') }}/{{isset($banner->banner_image) ? $banner->banner_image : ''}}');">>
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
                {!!isset($details->title_1) ? $details->title_1 : ''!!}
        

        <p>Download - <a href="{{ route('front.download.pdf', ['filename' => $details->terms_file_name]) }}" class="text-dark-green">{!!isset($details->terms_file_name) ? $details->terms_file_name : ''!!} </a> OR <a target="_blank" href="storage/app/public/uploads/terms/{{$details->terms_file_name}}"
            class="text-dark-green"><b> Read More</b> </a>

        </p>

        <div class="section-title mt-4">
            {!!isset($details->title_2) ? $details->title_2 : ''!!}
            {!!isset($details->title_2_description) ? $details->title_2_description : ''!!}

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