@extends('Front.Layout.master-layout')

@section('content')

    @if (isset($ourProduct) && $ourProduct->product_details_banner != null)
        <section class="banner-product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ asset('storage/app/public/uploads/ourproductbanner/product_details_banner') . '/' . $ourProduct->product_details_banner }}"
                            class="w-100 img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <img src="{{ asset('storage/app/public/uploads/OurProductImage/image') . '/' . $product->image }}"
                        class="w-100 img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="product-inner-details">
                        @if (isset($product) &&
                                isset($product->productCategory) &&
                                isset($product->productCategory->divisions) &&
                                $product->productCategory->divisions->title != null)
                            <ul class="d-flex justify-content-between align-items-center mb-2">
                                <li>
                                    <div class="paragraph-wrapper-bold-light">
                                        {!! $product->productCategory->divisions->title !!}
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><img
                                            src="{{ URL::asset('resources/front-asset/images/share-icon.png') }}"
                                            alt=""></a>
                                </li>
                            </ul>
                        @endif

                        <div class="product-name-box d-flex justify-content-between align-items-center mb-3">
                            <h2>{{ $product->product_title }}</h2>
                            @if (isset($product) && $product->product_label != null)
                                <div class="product-category-name">

                                    <div class="paragraph-wrapper-bold-light">
                                        <p>{{ $product->product_label }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{ strip_tags($product->composition) }}
                        <hr>
                        <div>
                            @if (isset($product) && $product->packing_type != null)
                                <div class="paragraph-wrapper-bold-light mb-2">
                                    <p>Packaging Type : <span>{{ $product->packing_type }}</span></p>
                                </div>
                            @endif
                            @if (isset($product) && $product->packing_size != null)
                                <div class="paragraph-wrapper-bold-light mb-2">
                                    <p>Packaging Size : <span>{{ $product->packing_size }}</span></p>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div>
                            @if (isset($product) && $product->mrp != null)
                                <div class="paragraph-wrapper-bold-light mb-2">
                                    <p>MRP : <span>{{ $product->mrp }}</span></p>
                                </div>
                            @endif
                            <div class="d-block d-sm-flex d-md-flex">
                                @if (isset($product) && $product->ptr != null)
                                    <div class="paragraph-wrapper-bold-light mb-2 me-3">
                                        <p>PTR : <span>{{ $product->ptr }}</span></p>
                                    </div>
                                @endif
                                @if (isset($product) && $product->pts != null)
                                    <div class="paragraph-wrapper-bold-light mb-2">
                                        <p>PTS : <span>{{ $product->pts }}</span></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="brans-sience-name-box">
                            @if (isset($product) && $product->label_2 != null)
                                <div class="paragraph-wrapper-bold-light">
                                    <p>Brand Since - {{ $product->label_2 }}</p>
                                </div>
                            @endif


                        </div>
                        @if (isset($product) && $product->composition != null)
                            <hr>
                            <div class="mb-2">
                                <p>Composition:</p>
                            </div>
                            <div class="paragraph-wrapper-bold">
                                {!! $product->composition !!}
                            </div>
                        @endif
                        <hr>
                        <div class="product-submit-button">
                            <a href="" class="btn submit-product text-bold-custom" data-bs-toggle="modal"
                            data-bs-target=".send_inquiry">Send Enquiry</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade send_inquiry" id="brochuremodalinqury" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="download_broucherLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black-custom" id="download_broucherLabel">Send Inquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="broucher-download-popup-form">
                        <form action="" id="inquiryformid" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Enter Name</label>
                                <input type="text" class="form-control" name="name" id="name_inq"
                                    placeholder="Enter Name">
                            </div>
                            <div id="name_inq_error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" class="form-control" name="email" id="email_inq"
                                    placeholder="Enter Email">
                            </div>
                            <div id="email_inq_error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn button-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--  -->
    </section>

    <section class="about-product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title mb-2">
                        <h2>About the product</h2>
                    </div>
                    @if (isset($product) && $product->product_description != null)
                        <div class="section-title mb-2">
                            <h6>Description</h6>
                        </div>

                        <div class="paragraph-wrapper mb-3">
                            <!-- <ul> -->
                                {!! $product->product_description !!}
                            <!-- </ul> -->
                        </div>
                    @endif
                    @if (isset($product) && $product->product_side_effect != null)
                        <div class="section-title mb-2">
                            <h6>Side Effects</h6>
                        </div>
                        <div class="paragraph-wrapper mb-3">
                            {!! $product->product_side_effect !!}
                        </div>
                    @endif
                    @if (isset($product) && $product->product_indication != null)
                        <div class="section-title mb-2">
                            <h6>Indication</h6>
                        </div>
                        <div class="paragraph-wrapper mb-2">
                            {!! $product->product_indication !!}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    @if (isset($similerProducts) && count($similerProducts))
        <section class="similar-products-section">
            <div class="container">

                <div class="section-title mb-4">
                    <h3>Similar Products</h3>
                </div>
                <div class="row justify-content-center">

                    @foreach ($similerProducts as $similerProduct)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="similar-product-box">
                                <a href="{{ route('front.product-details', ['id' => $similerProduct->id]) }}">
                                    <div class="similar_product_image">
                                        <img src="{{ asset('storage/app/public/uploads/OurProductImage/image') . '/' . $similerProduct->image }}"
                                        class="w-100 img-fluid" alt="">
                                    </div>
                                    <h5>Acamprosate Calcium 333mg Tablets</h5>
                                </a>
                                <p>Packaging Type : <span>{{ $similerProduct->packing_type }}</span></p>
                                <p>Packaging Size : <span>{{ $similerProduct->packing_size }}</span></p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <section class="newly-launched-products-section">
        <div class="container">

            <div class="section-title mb-4">
                <h2>Newly launched Products</h2>
            </div>
            <div class="row justify-content-center" id="newly-launched-products">



            </div>

            <div class="text-center mt-5">
                <button id="product-load-more" class="btn button-dark">Load More</button>
            </div>

        </div>
    </section>


    @if (isset($proudMember) && count($proudMember))
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
    
                    <div class="swiper-button-next hide-btn"></div>
                <div class="swiper-button-prev hide-btn"></div>
                <div class="swiper-pagination hide-btn"></div>
                </div>
            </div>
        </div>
    </section>
    @endif


@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            var currentPage = 1;
            $('#product-load-more').on('click', function() {
                currentPage++;
                fetchCategoriesCall(currentPage);
            });
            fetchCategoriesCall(currentPage)

            function fetchCategoriesCall(page) {
                var csrfToken = '{{ csrf_token() }}';
                var perPage = 3;
                $.ajax({
                    url: '{{ route('front.fetch-new-products') }}',
                    method: 'POST',
                    data: {
                        page: page,
                        per_page: perPage,
                        _token: csrfToken,
                    },
                    success: function(response) {
                        var products = response.data;
                        var productsList = $('#newly-launched-products');
                        products.forEach(function(product) {
                            const route =
                                "{{ route('front.product-details', ['id' => ':id']) }}"
                                .replace(':id', product.id);

                            const imgURL =
                                "{{ asset('storage/app/public/uploads/OurProductImage/image/:IMGURL') }}"
                                .replace(':IMGURL', product.image);

                            productsList.append(`
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="newly-launch-box">
                                        <a href="${route}">
                                            <div class="new_launch_image_size">
                                                <img src="${imgURL}" class="w-100 img-fluid" alt="">
                                            </div>
                                            <h5>${product.product_title}</h5>
                                        </a>
                                        <p>Packaging Type : <span>${product.packing_type}</span></p>
                                        <p>Packaging Size : <span>${product.packing_size}</span></p>
                                    </div>
                                </div>
                                `);
                        });
                        if (currentPage >= response.last_page) {
                            $('#product-load-more').hide(); // Hide the button if it's the last page
                        } else {
                            $('#product-load-more').show(); // Hide the button if it's the last page
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#inquiryformid").validate({
                ignore: [],
                rules: {
                    'name': {
                        required: true,
                    },
                    'email': {
                        required: true,
                        email: true
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


                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    $('#' + element.attr('name') + '_error').html(error)
                },


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inquiryformid').on('submit', function(e) {
                e.preventDefault();

                let name = $('#name_inq').val();
                let email = $('#email_inq').val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('submit.inquiry') }}",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        _token: _token
                    },
                    success: function(response) {
                        if (response.success) {
                            // Display success alert
                            alert(response.success);

                            var myModalEl = document.getElementById('brochuremodalinqury');
                            var modal = bootstrap.Modal.getInstance(myModalEl);
                            modal.hide();

                            // Clear form fields
                            $('#name_inq').val('');
                            $('#email_inq').val('');

                            // Clear error messages
                            $('#name_inq_error').html('');
                            $('#email_inq_error').html('');
                        }
                    },
                    error: function(response) {
                        // Display error messages
                        $('#name_inq_error').html(response.responseJSON.errors.name);
                        $('#email_inq_error').html(response.responseJSON.errors.email);
                    }
                });
            });
        });
    </script>
@endsection
