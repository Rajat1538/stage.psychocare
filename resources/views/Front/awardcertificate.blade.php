@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/awards') }}/{{ $banner->banner_image }}')">
            <div class="container @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-content-none @endif">
                <div class="sub-inner-conent">
                    {!! isset($banner->banner_title) ? $banner->banner_title : '' !!}
                    {!! isset($banner->banner_description) ? $banner->banner_description : '' !!}
                </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="award">
        <div class="container">
            <div class="section-title text-center">
                <h2>Awards</h2>
            </div>

            <div class="row">
                <div class="row" id="award-wrapper">
                    @include('Front.includeaward')
                </div>

                <div class="text-center mt-5">
                    @if ($totalaward > 6)
                    <button id="loadMoreaward" class="btn button-dark mt-3">Load More</button>
                @endif

                </div>
            </div>
        </div>
    </section>

    <section class="award">
        <div class="container">
            <div class="section-title text-center  mb-3">
                <h2>Certificate</h2>
            </div>

            <div class="row">
                <div class="row" id="certificate-wrapper">
                    @include('Front.includecertificates')
                </div>
            </div>
            <div class="text-center">
                @if ($totalCertificates > 6)

                <button id="loadMoreCertificates" class="btn button-dark mt-3">Load More</button>
                @endif
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    
        $(document).ready(function () {
            let nextPage = 2; // As page 1 is already loaded
            $('#loadMoreCertificates').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("front.award-and-certificate") }}?page=' + nextPage,
                    type: 'GET',
                    data : 'certificate=certificate',
                    success: function(response) {
                        if(response) {
                            $('#certificate-wrapper').append(response);
                            nextPage++;
                        } else {
                            $('#loadMoreCertificates').hide();
                        }
                    }
                });
            });
    
            // Award Ajax
    
            let nextaward = 2; // As page 1 is already loaded
            $('#loadMoreaward').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("front.award-and-certificate") }}?page=' + nextaward,
                    type: 'GET',
                    data : 'award=award',
                    success: function(response) {
                        if(response) {
                            $('#award-wrapper').append(response);
                            nextaward++;
                        } else {
                            $('#loadMoreaward').hide();
                        }
                    }
                });
            });
        });
    </script>
@endsection

    