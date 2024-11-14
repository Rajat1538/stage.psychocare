@extends('Front.Layout.master-layout')
@section('styles')
    @php
        $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
        if (isset($ourProduct->image) && $ourProduct->image != null) {
            $mainImageUrl = asset('storage/app/public/uploads/ourproductbanner') . '/' . $ourProduct->image;
        }
    @endphp
    <style>
        .sub-header-main .background-sub {
            background-image: url({{ $mainImageUrl }})
        }
    </style>
@endsection
@section('content')
    <!--=============== Page Header start ===========-->

    <section class="sub-header-main mt-0">
        <div class="background-sub @if (
            (isset($ourProduct->title) && $ourProduct->title != null) ||
                (isset($ourProduct->description) && $ourProduct->description != null)) @else background-none @endif"
            style="background-image: url('{{ URL::asset('storage/app/public/uploads/ourproductbanner/product_details_banner') }}/{{ $ourProduct->product_details_banner }}');">
            <div class="container">
                <div class="sub-inner-conent">
                    {!! $ourProduct->title !!}
                    {!! $ourProduct->description !!}
                </div>
            </div>
        </div>
    </section>
    <!--=============== Page Header start END ===========-->

    <section class="product-search-bar-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <div class="section-title mb-2">
                        <h2>Search any Product</h2>
                    </div>
                    <p>Search the product based on your requirements </p>

                    <form action="{{ route('front.our-products') }}" method="GET">
                        <div class="box-search mt-3">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" value="{{ $searchQuery }}"
                                    placeholder="Enter Product Name, Salt Name" aria-label="Search"
                                    aria-describedby="search-addon" />
                                <button type="submit" class="border-0 p-0 " id="search-addon">
                                    <img src="{{ URL::asset('resources/front-asset/images/search-icon.svg') }}"
                                        alt="">
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="product-details-section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 order-1 order-md-0 order-lg-0 stickey-tabs">
                    <div class="tabs-accord-product-name">

                        @if (isset($ourDivisions) && count($ourDivisions))
                            <ul class="nav nav-tabs d-block d-lg-flex border-0 flex-lg-column" id="myTab" role="tablist">
                                @foreach ($ourDivisions as $key => $ourDivision)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($divisionID) && $divisionID == $ourDivision->id ? 'active' : (!isset($divisionID) && isset($firstOurDivisionList) && $firstOurDivisionList->id == $ourDivision->id ? 'active' : '') }}"
                                            href="{{ route('front.our-products', ['divisionID' => $ourDivision->id]) }}"
                                            id="division-tab" type="button"
                                            aria-selected="true">{{ strip_tags($ourDivision->title) }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        @endif

                        <div class="category-select-sec mt-4 mb-5 mb-md-0 mb-lg-0">

                            <div class="background-light-green">
                                <h4>Select Category</h4>

                                <form action="" method="">
                                    <div class="input-group">
                                        <input type="search" class="form-control border-0" placeholder="Search"
                                            aria-label="Search" id="category-search" aria-describedby="search-addon" />
                                        <button class="input-group-text border-0" id="search-addon">
                                            <img src="{{ URL::asset('resources/front-asset/images/search-icon.svg') }}"
                                                alt="">
                                        </button>
                                    </div>
                                </form>

                                <ul class="mt-4 mb-3 list-category-name">
                                    {{-- <li><a href="">PSYCHOCARE</a></li>
                                    <li><a href="">ANTI ANGINAL</a></li>
                                    <li><a href="">ANTI-COAGULANT</a></li>
                                    <li><a href="">ANTI-HYPONATREMIA</a></li>
                                    <li><a href="">ANTI-THYROIDISM</a></li>
                                    <li><a href="">ANIT-VIRAL</a></li>
                                    <li><a href="">ANTI-BIOTICS</a></li> --}}
                                </ul>

                                <button id="category-view-more" class="view-more-button">View More</button>

                            </div>

                        </div>

                    </div>
                </div>
                @if (isset($products) && count($products))
                    <div class="col-lg-9 col-md-8 mb-0 mb-md-5 mb-lg-0">

                        <div class="result-tabs-box">

                            <div class="tab-content accordion" id="myTabContent">

                                <div class="tab-pane fade show active accordion-item border-0" id="division-pane"
                                    role="tabpanel" aria-labelledby="division-tab" tabindex="0">

                                    <div class="accordion-header d-lg-none" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">Kyracare</button>
                                    </div>


                                    <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block"
                                        aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                                        <div class="accordion-body p-0">

                                            <div class="product-details-grid">
                                                <div class="row">

                                                    @foreach ($products as $item)
                                                        <div class="col-lg-12 col-xl-6 col-md-12">
                                                            <a
                                                                href="{{ route('front.product-details', ['id' => $item->id]) }}">
                                                                <div class="background-light-green">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="product-image-box">
                                                                                <img src="{{ asset('storage/app/public/uploads/OurProductImage/image') . '/' . $item->image }}"
                                                                                    class="img-fluid w-100" alt="">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="details-inner-products">
                                                                                <div class="product-name">
                                                                                    <h6>{{ $item->product_label }}</h6>
                                                                                </div>
                                                                                <p>{{ strip_tags($item->productCategory->divisions->title) }}
                                                                                </p>
                                                                                <h5>{{ $item->product_title }}</h5>
                                                                                <p>Packaging Type : <strong>
                                                                                        {{ $item->packing_type }}</strong>
                                                                                </p>
                                                                                <p>Packaging Size : <strong>
                                                                                        {{ $item->packing_size }}</strong>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="pagination-main mt-3">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-lg-end justify-content-center">
                                                <!-- Previous Page Link -->
                                                <li class="page-item {{ $products->previousPageUrl() ? '' : 'disabled' }}">
                                                    <a class="page-link previous-arrow"
                                                        href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">
                                                            <img src="{{ URL::asset('resources/front-asset/images/icon/previous-arrow-pagination.svg') }}"
                                                                alt="">
                                                        </span>
                                                    </a>
                                                </li>

                                                <!-- Pagination Links -->
                                                @php
                                                    $totalPages = $products->lastPage();
                                                    $currentPage = $products->currentPage();
                                                    $visiblePages = 3; // Change this to set how many page links to display
                                                    $halfVisible = floor($visiblePages / 2);
                                                    $start = max(
                                                        min(
                                                            $currentPage - $halfVisible,
                                                            $totalPages - $visiblePages + 1,
                                                        ),
                                                        1,
                                                    );
                                                    $end = min(
                                                        max($currentPage + $halfVisible, $visiblePages),
                                                        $totalPages,
                                                    );
                                                @endphp

                                                @if ($start > 1)
                                                    <li class="page-item disabled">
                                                        <span class="page-link">...</span>
                                                    </li>
                                                @endif

                                                @for ($i = $start; $i <= $end; $i++)
                                                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                                        <a class="page-link number-pagination"
                                                            href="{{ $products->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                @if ($end < $totalPages)
                                                    <li class="page-item disabled">
                                                        <span class="page-link">...</span>
                                                    </li>
                                                @endif

                                                <!-- Next Page Link -->
                                                <li class="page-item {{ $products->nextPageUrl() ? '' : 'disabled' }}">
                                                    <a class="page-link next-arrow" href="{{ $products->nextPageUrl() }}"
                                                        aria-label="Next">
                                                        <span aria-hidden="true">
                                                            <img src="{{ URL::asset('resources/front-asset/images/icon/next-arrow-pagination.svg') }}"
                                                                alt="">
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>

                                        </nav>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                @else
                    <div class="col-lg-9 col-md-8 mb-0 mb-md-5 mb-lg-0">

                        <div class="result-tabs-box">

                            <div class="tab-content accordion" id="myTabContent">

                                <div class="tab-pane fade show active accordion-item border-0" id="division-pane"
                                    role="tabpanel" aria-labelledby="division-tab" tabindex="0">

                                    <div class="accordion-header d-lg-none" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">Kyracare</button>
                                    </div>


                                    <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block"
                                        aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                                        <div class="accordion-body p-0">

                                            <div class="product-details-grid">
                                                <div class="row">

                                                    <div class="section-title text-center mb-5">
                                                        <h2>Products Not Found..!</h2>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>

                            </div>

                        </div>

                    </div>
                @endif

            </div>



        </div>

    </section>

    @if (isset($proudMember) && count($proudMember))
        <section class="member-section">
            <div class="container">
            <div class="container">
            <div class="section-title text-center mb-5">
                <h2>We are proud member of</h2>
            </div>

            <div class="proud-member-slider-sec-main">
                <div class="swiper partner_member mt-3">
                    <div class="swiper-wrapper">
                            @foreach ($proudMember as $image)
                            <div class="swiper-slide">
							    <div class="img-logo-box-partner">
                                    <img src="{{ URL::asset('storage/app/public/uploads/ProudMembers') }}/{{ $image['image'] }}"
                                        class="img-fluid">
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
    @endif

    @include('Front.Layout.becomefranchoer_popup')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            var firstOurDivision = {{ isset($divisionID) ? $divisionID : $firstOurDivision->id }};
            var categoryId = {{ isset($categoryId) ? $categoryId : 'null' }};
            var currentPage = 1;
            fetchCategories(firstOurDivision);
            $('#category-view-more').on('click', function() {
                currentPage++;
                fetchCategoriesCall(firstOurDivision, currentPage, true);
            });

            $('#category-search').on('keyup', function() {
                var saerch = $(this).val();
                currentPage = 1;
                fetchCategoriesCall(firstOurDivision, currentPage, false, saerch);
            });

            function fetchCategories(firstOurDivision) {
                var currentPage = 1;
                fetchCategoriesCall(firstOurDivision, currentPage, true)
            }

            function fetchCategoriesCall(firstOurDivision, page, viewMore = false, saerch = null) {
                var csrfToken = '{{ csrf_token() }}';
                var perPage = 10;
                $.ajax({
                    url: '{{ route('front.fetch-categories') }}',
                    method: 'POST',
                    data: {
                        division_id: firstOurDivision,
                        page: page,
                        per_page: perPage,
                        _token: csrfToken,
                        saerch: saerch
                    },
                    success: function(response) {
                        var categories = response.data;
                        var categoryList = $('.list-category-name');
                        if (!viewMore) {
                            categoryList.empty();
                        }
                        categories.forEach(function(category) {
                            const route =
                                "{{ route('front.our-products', ['divisionID' => ':divisionID', 'categoryId' => ':categoryId']) }}"
                                .replace(':divisionID', firstOurDivision)
                                .replace(':categoryId', category.id);
                            categoryList.append(
                                `<li><a href='${route}' class='${ categoryId && categoryId == category.id ? 'active' : '' }'>${category.category_name}</a></li>`
                            );
                        });
                        if (currentPage >= response.last_page) {
                            $('#category-view-more').hide(); // Hide the button if it's the last page
                        } else {
                            $('#category-view-more').show(); // Hide the button if it's the last page
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

        });
    </script>
@endsection
