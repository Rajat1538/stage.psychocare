<div class="tab-pane fade show active accordion-item border-0" id="kyracare-tab-pane" role="tabpanel" aria-labelledby="kyracare-tab" tabindex="0">

    <div class="accordion-header d-lg-none" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Kyracare</button>
    </div>
    <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent=".myTabContent">
        <div class="accordion-body p-0" id="">

            <div class="inner-tabs-category">
                <ul class="nav nav-tabs d-none d-lg-flex justify-content-lg-center border-0 mb-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link getCategory" id="neuro-pSychatrist-range-tab" data-bs-toggle="tab" data-bs-target="#neuro-pSychatrist-range-tab-pane" type="button" role="tab" aria-controls="neuro-pSychatrist-range-tab-pane" data-divid={{$divId}} {{-- data-category="Neuro" --}} data-category="Nuero" aria-selected="false">Neuro PSychatrist Range</button>

                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link getCategory" id="cardiac-diabetic-range-tab" data-bs-toggle="tab" data-bs-target="#cardiac-diabetic-range-tab-pane" type="button" role="tab" aria-controls="cardiac-diabetic-range-tab-pane" data-divid={{$divId}} data-category="Cardiac" aria-selected="false">Cardiac Diabetic Range</button>


                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link getCategory" id="general-range-tab" data-bs-toggle="tab" data-bs-target="#general-range-tab-pane" type="button" role="tab" aria-controls="general-range-tab-pane" data-divid={{$divId}} data-category="General" aria-selected="false">General Range</button>
                    </li>
                </ul>

                <div class="tab-content accordion myTabContent-inner" id="divCategoryDetail">

                    <div class="tab-pane fade show active accordion-item border-0" id="{{ $divCategoryName }}-tab-pane" role="tabpanel" aria-labelledby="{{ $divCategoryName }}-tab" tabindex="0">

                        <div class="accordion-header d-lg-none" id="headinginner{{ $divCategoryName }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseinner{{ $divCategoryName }}" aria-expanded="true" aria-controls="collapseinner{{ $divCategoryName }}">{{ $divCategoryName }}</button>
                        </div>
                        <div id="collapseinner{{ $divCategoryName }}" class="accordion-collapse collapse show d-lg-block" aria-labelledby="headinginner{{ $divCategoryName }}" data-bs-parent=".myTabContent-inner">
                            <div class="accordion-body p-0">

                                <div class="product_grid_division">

                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="product_division_box">
                                                <img src="{{ URL::asset('storage/app/public/uploads/OurDivisionPageProductImage') }}/{{ $product['image'] }}" class="img-fluid w-100" alt="">
                                                <h5>{!! $product->title !!}</h5>
                                                <a href="#" class="btn button-dark">Download Catalogue</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="pagination-main mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-lg-end justify-content-center">
                <!-- Previous Page Link -->
                <li class="page-item {{ $products->previousPageUrl() ? '' : 'disabled' }}">
                    <a class="page-link previous-arrow" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">
                            <img src="{{ URL::asset('resources/front-asset/images/icon/previous-arrow-pagination.svg') }}" alt="">
                        </span>
                    </a>
                </li>

                <!-- Pagination Links -->
                @php
                $totalPages = $products->lastPage();
                $currentPage = $products->currentPage();
                $visiblePages =3; // Change this to set how many page links to display
                $halfVisible = floor($visiblePages / 2);
                $start = max(min($currentPage - $halfVisible, $totalPages - $visiblePages + 1), 1);
                $end = min(max($currentPage + $halfVisible, $visiblePages), $totalPages);
                @endphp

                @if ($start > 1)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                @endif

                @for ($i = $start; $i <= $end; $i++) <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                    <a class="page-link number-pagination" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    @if ($end < $totalPages) <li class="page-item disabled">
                        <span class="page-link">...</span>
                        </li>
                        @endif

                        <!-- Next Page Link -->
                        <li class="page-item {{ $products->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link next-arrow" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">
                                    <img src="{{ URL::asset('resources/front-asset/images/icon/next-arrow-pagination.svg') }}" alt="">
                                </span>
                            </a>
                        </li>
            </ul>

        </nav>
    </div>

</div>
