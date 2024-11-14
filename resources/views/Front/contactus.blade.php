@php
    $ourDivisionsObjs = menuOurDivisionSection();
@endphp
@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
    <section class="sub-header-main mt-0">
        <div class="background-sub @if (
            (isset($banner->banner_title) && $banner->banner_title != null) ||
                (isset($banner->banner_description) && $banner->banner_description != null)) @else background-none @endif"
            style="background-image: url('{{ URL::asset('storage/app/public/uploads/contactus') }}/{!! isset($banner->banner_image) ? $banner->banner_image : '' !!}');">
            <div class="container @if (
                (isset($banner->banner_title) && $banner->banner_title != null) ||
                    (isset($banner->banner_description) && $banner->banner_description != null)) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! isset($banner->banner_title) ? $banner->banner_title : '' !!}
                    {!! isset($banner->banner_description) ? $banner->banner_description : '' !!}
                </div>
            </div>
        </div>
    </section>


    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="section-title">
                        <h2>Get In touch</h2>
                    </div>
                    <div class="d-flex mt-4">
                        <img src="{{ URL::asset('resources/front-asset/images/icon/map-pin.svg') }}" alt="">

                        <div class="paragraph-wrapper text_black_paragraph ms-3">
                            <p class="m-0">{!! isset($getintuch->address) ? $getintuch->address : '' !!}</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <img src="{{ URL::asset('resources/front-asset/images/icon/phone.svg') }}" alt="">
                        <div class="paragraph-wrapper text_black_paragraph ms-3">
                            <p class="m-0">{!! isset($getintuch->mobile) ? $getintuch->mobile : '' !!}</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <img src="{{ URL::asset('resources/front-asset/images/icon/email.svg') }}" alt="">
                        <div class="paragraph-wrapper text_black_paragraph ms-3">
                            <p class="m-0"> {!! isset($getintuch->email) ? $getintuch->email : '' !!}</p>
                        </div>
                    </div>
                    <ul class="d-flex social-media-footer mt-4">
                        @foreach ($socialmedia as $links)
                            <li class="me-3">
                                <a target="blank" href="{!! isset($links->name) ? $links->name : '' !!}">
                                    <img class="img-fluid"
                                        src="{{ URL::asset('storage/app/public/uploads/social') }}/{!! isset($links->image) ? $links->image : '' !!}"
                                        alt=""></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-8 mt-4 mt-lg-0">

                    <form id="brochureForm" action="" class="broucher-download-popup-form">
                        <div class="d-flex flex-column flex-lg-row justify-content-between">
                            <div class="w-100">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-1">Enter Name</label>
                                    <input type="text" name="name" id="name" class="form-control shadow-none"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="number" class="mb-1">Enter Number</label>
                                    <input type="number" name="number" id="number" class="form-control shadow-none"
                                        placeholder="Enter your number">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="division" class="mb-1">Select Division</label>
                                    <select name="division" id="division" class="form-select shadow-none"
                                        aria-label="Default select example">
                                        @foreach ($ourDivisionsObjs as $key => $ourDivisionsObj)
                                            <option selected value=""> Select Division</option>
                                            <option value="{!! $ourDivisionsObj['id'] !!}"> {!! $ourDivisionsObj['title'] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-100 ms-lg-3">
                                <div class="form-group mb-3">
                                    <label for="email" class="mb-1">Enter Email</label>
                                    <input type="email" name="email" id="email" class="form-control shadow-none"
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="message" class="mb-1">Message</label>
                                    <textarea name="message" id="message" class="form-control custom-textarea shadow-none"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="button" id="submitForm" class="btn button-dark">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <iframe src="{!! isset($getintuch->map_iframe) ? strip_tags($getintuch->map_iframe) : '' !!}" width="100%" height="433" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
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
                var valid = true;
                var countValidNumbers = 0;
                var formData = $('#brochureForm').serializeArray();
    
                // Simple frontend validation
                formData.forEach(function(field) {
                    if (field.name === "name" && field.value.trim() === "") {
                        alert("Name is required");
                        valid = false;
                    }
                    if (field.name === "number") {
                        if (field.value.trim() === "") {
                            alert("Number is required");
                            valid = false;
                        } else {
                            let numberValue = (field.value);
                            if ( numberValue.length  < 10) {
                                alert("Enter a valid number that is at least 10");
                                valid = false;
                            } 
                        }
                    }
                    if (field.name === "division" && field.value.trim() === "") {
                        alert("Division is required");
                        valid = false;
                    }
                    if (field.name === "message" && field.value.trim() === "") {
                        alert("Message is required");
                        valid = false;
                    }
                    if (field.name === "email" && !field.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
                        alert("Enter a valid email address");
                        valid = false;
                    }
                });
                if (valid) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('front.contact-us-form') }}",
                        data: formData,
                        success: function(response) {
                            alert(response.message);
                            $("#name").val('');
                            $("#number").val('');
                            $("#division").val('');
                            $("#email").val('');
                            $("#message").val('');
                        },
                        error: function(response) {
                            alert('Error: ' + response.responseJSON.message);
                        }
                    });
                }
            });
        });
    </script>
@endsection
    
