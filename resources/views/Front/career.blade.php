@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')

<section class="sub-header-main mt-0">
    <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/career') }}/{{ $banner->banner_image }}');">
        <div class="container @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-content-none @endif">
            <div class="sub-inner-conent">
                {!!isset($banner->banner_title) ? $banner->banner_title : ''!!}
                {!!isset($banner->banner_description) ? $banner->banner_description : ''!!}
            </div>
        </div>
    </div>
</section>

    <!--  -->

    <section class="">
        <div class="container">

            <duv class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mt-md-0 mb-3">
                        <h2>Why Join Us?</h2>
                    </div>
                    <p>At PCHPL, we believe that our employees are our greatest asset. We foster a dynamic,
                        collaborative, and
                        inclusive work environment where individuals are empowered to unleash their full potential.</p>
                </div>
            </duv>


            <div class="row align-items-center d-md-flex section-space">
                <div class="col-md-6 mb-3 mb-lg-0">
                    <img src="{{ URL::asset('storage/app/public/uploads/JoinUs') }}/{!! isset($joinus->image1) ? '/' . $joinus->image1 : '' !!}"
                        class="img-fluid h-100 w-100">
                </div>
                <div class="col-md-6">
                    <div class="section-title mb-3">
                        {!! isset($joinus->title_1) ? $joinus->title_1 : '' !!}
                    </div>
                    {!! isset($joinus->description_1) ? $joinus->description_1 : '' !!}

                    <div class="section-title mb-3 mt-4">
                        {!! isset($joinus->title_2) ? $joinus->title_2 : '' !!}
                    </div>
                    {!! isset($joinus->description_2) ? $joinus->description_2 : '' !!}

                </div>
            </div>
            <div class="row align-items-center d-md-flex section-space">
                <div class="col-md-6 order-1 order-lg-0 order-md-0">
                    <div class="section-title mb-3">
                        {!! isset($joinus->title_3) ? $joinus->title_3 : '' !!}
                    </div>
                    {!! isset($joinus->description_3) ? $joinus->description_3 : '' !!}


                    <div class="section-title mb-3 mt-4">
                        {!! isset($joinus->title_4) ? $joinus->title_4 : '' !!}
                    </div>
                    {!! isset($joinus->description_4) ? $joinus->description_4 : '' !!}

                </div>
                <div class="col-md-6 mb-3 mb-lg-0">

                    <img src="{{ URL::asset('storage/app/public/uploads/JoinUs') }}/{!! isset($joinus->image2) ? '/' . $joinus->image2 : '' !!}"
                        class="img-fluid h-100 w-100 ">
                </div>
            </div>
        </div>
    </section>

    <section class="current-opportunities-section">
        <div class="container">

            <duv class="row">
                <div class="col-md-12 mb-5 text-center">
                    <div class="section-title mt-md-0 mb-2 text-center">
                        <h2>Current Opportunities</h2>
                    </div>
                    <p>Explore exciting career opportunities at PCHPL across various functional areas</p>

                </div>
            </duv>

            <div class="row">

                {{-- @foreach ($currentOpportunities as $currentOpportunity)
                    <div class="col-lg-6">
                        <div class="box-carrer-content">
                            <div
                                class="d-block d-sm-flex d-md-flex d-lg-flex  justify-content-between align-items-lg-center mb-3">
                                <div>
                                    <h4>{!! isset($currentOpportunity->name) ? $currentOpportunity->name : '' !!}</h4>
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="images/icon/location-2.svg" alt="" class="img-fluid me-2">

                                        <p>{!! isset($currentOpportunity->location) ? $currentOpportunity->location : '' !!}</p>

                                    </div>
                                </div>
                                <div>
                                    <a type="button" data-bs-toggle="modal" formid="{{$currentOpportunity->id}}" data-bs-target=".carrer_apply-form"
                                        class="btn button-dark mt-3 formid">Apply Now</a>
                                </div>
                            </div>
                            {!! isset($currentOpportunity->description) ? $currentOpportunity->description : '' !!}
                        </div>
                    </div>
                @endforeach --}}
                <div class="col-lg-12">
                    <div class="pagination-main">
                        <div class="row" id="career-posts">
                            @include('Front.career-pagination', ['currentOpportunities' => $currentOpportunities])
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    @if ($currentOpportunities->lastPage() > 1)
                        <!-- Only display pagination if there is more than one page -->
                        <div class="pagination-main">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-lg-end justify-content-center">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $currentOpportunities->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link previous-arrow"
                                            href="{{ $currentOpportunities->previousPageUrl() }}" aria-label="Previous">
                                            <img src="{{ URL::asset('resources/admin-asset/img/previous-arrow-pagination.svg') }}" />
                                        </a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @for ($i = 1; $i <= $currentOpportunities->lastPage(); $i++)
                                        <li
                                            class="page-item {{ $currentOpportunities->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link number-pagination"
                                                href="{{ $currentOpportunities->url($i) }}">{{ $i }}</a>

                                        </li>
                                    @endfor

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $currentOpportunities->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link next-arrow me-0"
                                            href="{{ $currentOpportunities->nextPageUrl() }}" aria-label="Next">
                                            <img src="{{ URL::asset('resources/admin-asset/img/next-arrow-pagination.svg') }}" />
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div> --}}
            </div>


            <!-- Popup Carrer Apply Form -->
            <!-- Modal -->
            <div class="modal fade carrer_apply-form" id="formmodal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="carrer_apply-formLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="carrer_apply-formLabel">Your Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="broucher-download-popup-form">
                                <form id="brochureForm" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="opportunities_id" id="opportunities_id">
                                    <div class="form-group">
                                        <label for="name">Enter Name</label>
                                        <input type="text" id="name" name='name' class="form-control"
                                            placeholder="Enter your name">
                                    </div>
                                    <div id="career_name_error" class="text-danger"> @error('point')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter your email id">
                                    </div>
                                    <div id="career_email_error" class="text-danger"> @error('point')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control"
                                            placeholder="Enter your subject">
                                    </div>
                                    <div id="career_subject_error" class="text-danger"> @error('point')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Upload Resume</label>
                                        <input type="file" id="resume" accept=".pdf" name="resume"
                                            class="input-file form-control">
                                    </div>
                                    <div id="career_resume_error" class="text-danger"> @error('point')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea id="message" rows="3" name="message" placeholder="" class="form-control"></textarea>
                                    </div>
                                    <div id="career_message_error" class="text-danger"> @error('point')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="submitForm" class="btn button-dark">Submit</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                        {{-- <div class="modal-footer">
                        <button type="button" class="btn button-dark">Submit</button>
                        <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button> -->
                    </div> --}}
                    </div>
                </div>
            </div>

            <!-- End Carrer Apply Form -->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#brochureForm").validate({
                ignore: [],
                rules: {
                    'name': {
                        required: true,
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'subject': {
                        required: true,
                    },
                    'resume': {
                        required: true,
                    },
                    'message': {
                        required: true,
                    },
                },
                messages: {
                    'name': {
                        required: 'Please enter a Name',
                    },
                    'email': {
                        required: "Email is required.",
                        email: "Please enter a valid email address."
                    },
                    'subject': {
                        required: 'Please enter a Subject',
                    },
                    'resume': {
                        required: "Please enter a Resume.",
                    },
                    'message': {
                        required: "Please enter a Message.",
                    },
                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    $('#career_' + element.attr('name') + '_error').html(error)
                },


            });
            $('.formid').click(function(){
                formid= $(this).attr('formid')
                $('#opportunities_id').val(formid)
            })

            $('#brochureForm').submit(function(e) {
                e.preventDefault(); // prevent the form from submitting in the traditional way

                if ($(this).valid()) {
                    var formData = new FormData(this);

                    // Assuming your file input has an id of 'pdfFile'
                    var pdfFile = $('#resume')[0].files[
                    0]; // Get the first file (assuming single file input)
                    formData.append('pdfFile', pdfFile);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.careerform.add') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // console.log(response);
                            alert(response);
                            $('#brochureForm')[0].reset();
                        var myModalEl = document.getElementById('formmodal');
                        var modal = bootstrap.Modal.getInstance(myModalEl); // Retrieve the modal instance
                        modal.hide(); //
                        },
                        error: function(response) {
                            alert('Error: ' + response);
                        }
                    });
                }
            });

        });
    </script>
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
                    $('#career-posts').html(data);
                }
            });
        });
    });
</script>

@endsection
