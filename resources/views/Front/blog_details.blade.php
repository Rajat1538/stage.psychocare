@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

<section class="sub-header-main mt-0">
    <div class="background-sub @if(isset($banner->blog_list_banner_title) && $banner->blog_list_banner_title != null || isset($banner->blog_list_banner_description) && $banner->blog_list_banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/blogpage/blog_list_banner_image') }}/{!!isset($banner->blog_list_banner_image) ? $banner->blog_list_banner_image : ''!!}')">
        <div class="container @if(isset($banner->blog_list_banner_title) && $banner->blog_list_banner_title != null || isset($banner->blog_list_banner_description) && $banner->blog_list_banner_description != null) @else background-content-none @endif">
            <div class="sub-inner-conent">
                {!!isset($banner->blog_list_banner_title) ? $banner->blog_list_banner_title : ''!!}
                {!!isset($banner->blog_list_banner_description) ? $banner->blog_list_banner_description : ''!!} </div>
                 </div>
        </div>
    </div>
</section>
<!--=============== Page Header start END ===========-->

<section class="container">
    <a href="{{route('front.blog')}}" class="d-flex align-items-center text-dark">
        <img src="{{ URL::asset('resources/front-asset/images/icon/back.svg') }}" class="img-fluid">
        <span class="ps-2">Back to Blogs</span>
    </a>

    <div class="section-title mt-3 mb-3">
        {!!isset($blogdetails->title) ? $blogdetails->title : ''!!}
    </div>

    <div class="paragraph-wrapper">
        {!!isset($blogdetails->description) ? $blogdetails->description : ''!!}
    </div>

    
    <div class="section-title mt-5 mb-3">
        <h3>Add Comment</h3>
    </div>
    <form action="" id="brochureForm" class="broucher-download-popup-form">
        <input type="hidden" name="blog_id" id="blog_id" value="{{ $id }}">
        <div class="form-group mb-3">
            <label for="name" class="mb-1">Enter Name</label>
            <input type="text" name="name" id="name" class="form-control shadow-none"
                placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="comment" class="mb-1">Comment</label>
             <textarea name="comment" id="comment" class="form-control custom-textarea shadow-none"></textarea>
        </div>
        <button type="button" id="submitForm" class="btn button-dark mt-4">Submit</button>
    </form>
</section>

<section class="blog-upcoming-events-main">
    <div class="container">

        <div class="section-title text-center mb-3">
            <h2>Upcoming Events</h2>
        </div>

        <div class="swiper eventblogslider">
            <div class="swiper-wrapper">
                
                @foreach ($upcomingevents as $upcomingevent)
                <div class="swiper-slide">
                    <div class="box-event-slider">
                        <div class="latest-event-slid">
                        <img src=" {{ URL::asset('storage/app/public/uploads/upcomingevents/image') }}/{!! isset($upcomingevent->image) ? $upcomingevent->image : '' !!}" class="img-fluid w-100" alt="">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
   $(document).ready(function() {
    $('#submitForm').click(function(e) {
        e.preventDefault();
        var formData = $('#brochureForm').serialize(); // Serialize the form data

        $.ajax({
            type: "GET",
            url: "{{ route('front.blog_details_form') }}", // Assuming URL is correct
            data: formData,
            dataType: "json", // Expecting JSON response
            success: function(response) {
                // Check if the expected properties exist in the response
                if (response && response.hasOwnProperty('message')) {
                    alert("Success: " + response.message);
                } else {
                    // Handle missing properties
                    console.error("Success response missing 'message':", response);
                    alert("Success response structure is unexpected.");
                }
            },
            error: function(xhr) {
                // Handle errors and potential missing properties in error response
                if (xhr.responseJSON && xhr.responseJSON.hasOwnProperty('message')) {
                    alert("Error: " + xhr.responseJSON.message);
                } else {
                    console.error("Error response structure is unexpected:", xhr.responseText);
                    alert("An unexpected error occurred.");
                }
            }
        });
    });
});
</script>
@endsection