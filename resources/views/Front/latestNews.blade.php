@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
@php
use Illuminate\Support\Str;
@endphp
    <section class="sub-header-main mt-0">
        <div class="background-sub @if(isset($banner->banner_title) && $banner->banner_title != null || isset($banner->banner_description) && $banner->banner_description != null) @else background-none @endif"
            style="background-image: url('{{ URL::asset('storage/app/public/uploads/latestNewsPage/banner_image') }}/{!! isset($banner->banner_image) ? $banner->banner_image : '' !!}')">
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
                @foreach ($blogdetails as $blogdetail)
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-box-grid">
                            <div class="row align-items-md-center">
                                <div class="col-lg-4 col-md-12 mb-3 mb-lg-0 mb-md-0">
                                    <img src="{{ URL::asset('storage/app/public/uploads/blogs/image/' . $blogdetail->image) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <h5>{!! strlen($blogdetail->title) > 100 ? strip_tags(substr($blogdetail->title, 0, 100)) . '...' : strip_tags($blogdetail->title) !!}</h5>
                                    {!! isset($blogdetail->description) ? Str::limit($blogdetail->description, 100, '...') : '' !!}
                                    <div class="date-event-slider">
                                        {{ $blogdetail->created_at ? $blogdetail->created_at->format('d-m-Y') : 'No date available' }}
                                    </div>
                                    <a href="{{ route('front.blog-details', ['id' => $blogdetail->id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            @if ($blogdetails->lastPage() > 1)
                <div class="pagination-main">
                    {{-- <div class="pagination-area"> --}}
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-lg-end justify-content-center">
                                <li class="page-item {{ $blogdetails->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link previous-arrow" href="{{ $blogdetails->previousPageUrl() }}">
                                        <img src="{{ URL::asset('resources/admin-asset/img/previous-arrow-pagination.svg') }}" />
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $blogdetails->lastPage(); $i++)
                                    <li class="page-item {{ $blogdetails->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link number-pagination" href="{{ $blogdetails->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ !$blogdetails->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link next-arrow" href="{{ $blogdetails->nextPageUrl() }}">
                                        <img src="{{ URL::asset('resources/admin-asset/img/next-arrow-pagination.svg') }}" />
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    {{-- </div> --}}
                </div>
            @endif
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
                type: 'GET',
                success: function(data) {
                    // Assuming the HTML response contains the updated blog posts and pagination
                    $('#blog-posts').html($(data).find('#blog-posts').html());
                    $('.pagination').html($(data).find('.pagination').html());
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    // Optionally, you can show an error message to the user
                }
            });
        });
    });
</script>

@endsection
