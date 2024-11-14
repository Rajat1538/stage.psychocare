@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
	<section class="sub-header-main mt-0">
		<div class="background-sub @if(isset($PcdPharmaFranchiseObj->banner_title) && $PcdPharmaFranchiseObj->banner_title != null || isset($PcdPharmaFranchiseObj->banner_description) && $PcdPharmaFranchiseObj->banner_description != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/pcdpharmafranchise/banner_image') }}/{{ $PcdPharmaFranchiseObj->banner_image ?? '' }}');">
			<div class="container @if(isset($PcdPharmaFranchiseObj->banner_title) && $PcdPharmaFranchiseObj->banner_title != null || isset($PcdPharmaFranchiseObj->banner_description) && $PcdPharmaFranchiseObj->banner_description != null) @else background-content-none @endif">
				<div class="sub-inner-conent">
					{!! $PcdPharmaFranchiseObj->banner_title ?? '' !!}
					{!! $PcdPharmaFranchiseObj->banner_description ?? '' !!}
				</div>
			</div>
		</div>
	</section>

	<section class="">
		<div class="container ">
			<div class="row align-items-center d-md-flex section-space">
				<div class="col-md-6">
					<div class="section-title mt-md-0 mt-3 mb-3">
						{!! $PcdPharmaFranchiseObj->pharma_franchise_title ?? '' !!}
					</div>
					{!! $PcdPharmaFranchiseObj->pharma_franchise_description ?? '' !!}
					<a href="{{ $PcdPharmaFranchiseObj->pharma_franchise_button_url ?? '' }}" class="btn button-dark mt-3">{{ $PcdPharmaFranchiseObj->pharma_franchise_button_title ?? '' }}</a>
				</div>
				<div class="col-md-6 d-none d-md-flex">
					<img src="{{ URL::asset('storage/app/public/uploads/pcdpharmafranchise/pharma_franchise_image') }}/{{ $PcdPharmaFranchiseObj->pharma_franchise_image ?? '' }}" class="img-fluid h-100 w-100">
				</div>
			</div>
			<div class="row align-items-center d-md-flex section-space">
				<div class="col-md-6  ">
					<img src="{{ URL::asset('storage/app/public/uploads/pcdpharmafranchise/pcd_image') }}/{{ $PcdPharmaFranchiseObj->pcd_image ?? '' }}" class="img-fluid h-100 w-100 ">
				</div>
				<div class="col-md-6 order-md-0 order-1">
					<div class="section-title mt-md-0 mt-3 mb-3">
						{!! $PcdPharmaFranchiseObj->pcd_title ?? '' !!}
					</div>
					{!! $PcdPharmaFranchiseObj->pcd_description ?? '' !!}
				</div>
			</div>
		</div>
	</section>

	<section class="stats-section">
		<div class="container">
			<div class="section-title-light text-center mb-5">
				{!! $PcdPharmaFranchiseObj->journey_title ?? '' !!}
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-8 col-md-8 col-sm-12 col-12">
					<div class="d-sm-flex justify-content-between text-center">
						<div class="mx-2">
                            <h2>{!! isset($PcdPharmaFranchiseObj->journey_customers) ? $PcdPharmaFranchiseObj->journey_customers : '' !!}</h2>
                            <p>Customers</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($PcdPharmaFranchiseObj->journey_manufacturing_facilities) ? $PcdPharmaFranchiseObj->journey_manufacturing_facilities : '' !!}</h2>
                            <p>Manufacturers</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($PcdPharmaFranchiseObj->journey_sku) ? $PcdPharmaFranchiseObj->journey_sku : '' !!}</h2>
                            <p>SKU's</p>
                        </div>
                        <div class="mx-2">
                            <h2>{!! isset($PcdPharmaFranchiseObj->journey_employees) ? $PcdPharmaFranchiseObj->journey_employees : '' !!}</h2>
                            <p>Employees</p>
                        </div>
					</div>
					<hr>
					<div class="text-center">
						<a href="{{ $PcdPharmaFranchiseObj->journey_button_url ?? '' }}" class="btn button-light-big mt-3">{{ $PcdPharmaFranchiseObj->journey_button_title ?? '' }}</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="">
		<div class="container ">
			<div class="row align-items-center d-md-flex section-space">
				<div class="col-md-6 order-md-0 order-1">
					<div class="section-title mt-md-0 mt-3 mb-3">
						{!! $PcdPharmaFranchiseObj->psychocare_title ?? '' !!}
					</div>
					{!! $PcdPharmaFranchiseObj->psychocare_description ?? '' !!}
				</div>
				<div class="col-md-6  ">
					<img src="{{ URL::asset('storage/app/public/uploads/pcdpharmafranchise/psychocare_image') }}/{{ $PcdPharmaFranchiseObj->psychocare_image ?? '' }}" class="img-fluid h-100 w-100 ">
				</div>
			</div>
		</div>
	</section>

	<section class="PCD-section">
		<div class="container">
			<div class="section-title text-center">
				<h2>Utilize the Opportunity<br> Partner with PCHPL’s PCD Pharma Franchise</h2>
			</div>
			<div class="swiper PCD_slider mt-4">
				<div class="swiper-wrapper">
					@foreach($PcdPharmaAdvantageObjs as $key => $PcdPharmaAdvantageObj)
						<div class="swiper-slide">
							<div class="PCD-concerns">
								<div class="image-PCD">
									<img src="{{ URL::asset('storage/app/public/uploads/pcdpharmaadvantage/image') }}/{{ $PcdPharmaAdvantageObj->image ?? '' }}" alt="">
								</div>
								<div class="inner-content_logo-slider">
									{!! $PcdPharmaAdvantageObj->title ?? '' !!}
									{!! $PcdPharmaAdvantageObj->description ?? '' !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>

	</section>

	<section class="trusted-manufacturing-section">
        <div class="container">

            <div class="section-title text-center">
                <h2>Our Trusted Manufacturers</h2>
            </div>
            <div class="swiper trusted_manufacturing mt-3">
                <div class="swiper-wrapper">
                    @foreach ($TrustedManufacturerObjs as $TrustedManufacturerObj)
                        <div class="swiper-slide">
                            <div class="our-trusted-box">
                                <div class="image_review_profile">
                                    <img src="{{ URL::asset('storage/app/public/uploads/TrustedManufacturers') }}/{{ $TrustedManufacturerObj->image }}"
                                        alt="" class="profile-man">
                                </div>
                                {!! isset($TrustedManufacturerObj->name) ? $TrustedManufacturerObj->name : '' !!}
                                <img src="{{ URL::asset('resources/front-asset/images/quite-icon.png') }}" alt=""
                                    class="quite-icon-img">
                                {!! isset($TrustedManufacturerObj['description']) ? substr($TrustedManufacturerObj->description, 0, 300) : '' !!}
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

	<section class="directors-section">
		<div class="container">
			<div class="section-title mt-md-0 mt-3 text-center">
				<h2>Our Quality Assurances</h2>
			</div>
			<div class="row d-flex justify-content-center mt-5">
				@foreach($QualityAssuranceObjs as $key => $QualityAssuranceObj)
					<div class="col-md-6 col-6 col-lg-3 text-center">
						<img src="{{ URL::asset('storage/app/public/uploads/qualityassurance/image') }}/{{ $QualityAssuranceObj->image ?? '' }}" class="img-fluid">
					</div>
				@endforeach
			</div>
		</div>
	</section>

	{{-- <section class="launch-section">

		<div class="section-title-light mt-md-0 mt-3 text-center">
			<h2>Empower Your Business with us <br> Start Your PCD Pharma Franchise Journey Now!</h2>
		</div>

		<div class="text-center">
			<a href="" class="btn button-light-big mt-3">Let's Talk</a>
		</div>
	</section> --}}

    @include('Front.Layout.letstalk_popup')

	<section class="testimonial-section mb-5 d-none d-md-block">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our Clients says</h2>
            </div>
            <div class="swiper testimonial mt-4">
                <div class="swiper-wrapper">
                    @foreach ($ClientReviewObjs as $ClientReviewObj)
                        <div class="swiper-slide">
                            <div class="review-box">
                                <div class="row align-items-center">
                                    <!-- <div class="col-md-5">
										<div class="customers-testimonial-img">
                                        	<img src="{{ URL::asset('storage/app/public/uploads/ClientReviews') }}/{{ isset($ClientReviewObj['image']) ? $ClientReviewObj['image'] : '' }}"
                                            class="img-fluid w-100">
										</div>
                                    </div> -->
                                    <div class="col-md-12 mx-auto">
                                        <div class="review-content">
                                            <img src="{{ URL::asset('resources/front-asset/images/quote.png') }}"
                                                class="img-fluid">
                                            {!! $ClientReviewObj['description'] !!}
                                            <h4>{!! $ClientReviewObj['name'] !!}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

	<section class="division-section">
        <div class="container">

            <div class="section-title-light text-start text-md-center">
                <h2>Our Division & Sister Concerns</h2>
            </div>
            <div class="swiper Division mt-4">
                <div id="adddivisioncls" class="swiper-wrapper">
                    <?php $addclass = 0; ?>
                    @foreach ($OurDivisionObjs as $key =>$division)
                        <?php $addclass++; ?>

                        <div class="swiper-slide">
                            <div class="division-box">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="division_image_height">
                                            <img src="{{ URL::asset('storage/app/public/uploads/Ourdivision') }}/{{ $division['image'] }}"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="division-content">
                                            <h4>{!! $division['title'] !!}</h4>
                                            {!! $division['description'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

    </section>
	<section class="">
		<div class="container">
			<div class="section-title text-center text-lg-start">
				<h2>Newly launched Products</h2>
			</div>
			<div class="row my-4">
				@foreach($ProductObjs as $key => $ProductObj)
				<div class="col-md-4 col-sm-6 col-12">
					<a href="{{ route('product.click') }}" class="new-launch-card">
						<div class="new_launch_image_size">
							<img src="{{ URL::asset('storage/app/public/uploads/newlaunch') }}/{{ $ProductObj->image ?? '' }}" alt=""
								class="img-fluid w-100">
						</div>
						<h4>{!! $ProductObj->title !!}</h4>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	<section class="Partner-section trusted-manufacturing-section">
		<div class="container">
			<div class="section-title text-center">
				<h2>Our Logistic Partner</h2>
			</div>
			<div class="swiper logo-partner mt-5">
				<div class="swiper-wrapper">
					@foreach($LogisticPartnerObjs as $key => $LogisticPartnerObj)
						<div class="swiper-slide">
							<div class="logo-slider">
								<img src="{{ URL::asset('storage/app/public/uploads/logisticpartner/image') }}/{{ $LogisticPartnerObj->image ?? '' }}" class="img-fluid ">
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	@include('Front.Layout.level_up_form')

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
	<script>
        var addclass = {{ $addclass }};
        if (addclass < 2) {
            $("#adddivisioncls").addClass("justify-content-center");
        }
    </script>
@endsection
