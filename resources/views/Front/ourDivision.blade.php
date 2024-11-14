@extends('Front.Layout.master-layout')
@section('styles')
@endsection
@section('content')
	<!--=============== Page Header start ===========-->
		<section class="sub-header-main mt-0">
			<div class="background-sub @if(isset($banner['title']) && $banner['title'] != null || isset($banner['description']) && $banner['description'] != null) @else background-none @endif" style="background-image: url('{{ URL::asset('storage/app/public/uploads/OurDivisionBanner') }}/{{ $banner['image'] }}')">
				<div class="container @if(isset($banner['title']) && $banner['title'] != null || isset($banner['description']) && $banner['description'] != null) @else background-content-none @endif">
					<div class="sub-inner-conent">
						{!! isset($banner['title']) ? $banner['title'] : '' !!}
						{!! isset($banner['description']) ? $banner['description'] : '' !!}
					</div>
				</div>
			</div>
		</section>
	<!--=============== Page Header start END ===========-->

	<section class="our-divison-section">
		@if(session('error'))
			<div class="alert alert-danger" id="error-msg">
				{{ session('error') }}
			</div>
		@endif
		<div class="container-fluid">
			<div class="row">
				<!--=============== our-division start ===========-->
					<div class="col-lg-3 stickey-tabs">
						<div class="tabs_divison-main">
							@if (isset($ourDivisions) && count($ourDivisions))
								<ul class="nav nav-tabs d-none d-lg-flex border-0 flex-lg-column" id="myTab" role="tablist">
									@foreach ($ourDivisions as $ourDivision)
										<li class="nav-item" role="presentation">
											@if(empty($ourDivision['division_link']))
												<a class="nav-link {{ $divisionID == $ourDivision->id ? 'active' : '' }}"
													href="{{ route('front.our-division.category', ['divisionID' => $ourDivision->id]) }}"
													id="division-tab-{{ $ourDivision->id }}" type="button"
													aria-selected="{{ $divisionID == $ourDivision->id ? 'true' : 'false' }}">
													{{ strip_tags($ourDivision->title) }}
												</a>
											@else
												<a href="{{ $ourDivision['division_link'] }}" class="nav-link">
													{{ strip_tags($ourDivision['title']) }}
												</a>
											@endif
										</li>
									@endforeach
								</ul>
							@endif
						</div>
					</div>
				<!--=============== our-division end ===========-->

				<!--=============== our-division rigth start ====-->
					<div class="col-lg-9">
						<div class="result-tabs-divison">
							<div class="tab-content accordion myTabContent" id="">
								<div class="tab-pane fade show active accordion-item border-0" id="kyracare-tab-pane"
									role="tabpanel" aria-labelledby="kyracare-tab" tabindex="0">
									<div class="accordion-header d-lg-none" id="headingOne">
										<button class="accordion-button" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseOne" aria-expanded="true"
											aria-controls="collapseOne">Kyracare</button>
									</div>
									<div id="collapseOne" class="accordion-collapse collapse show  d-lg-block"
										aria-labelledby="headingOne" data-bs-parent=".myTabContent">
										<div class="accordion-body p-0">
											<!-- Inner Tabs -->
											<div class="inner-tabs-category">

												<ul class="nav nav-tabs d-none d-lg-flex justify-content-lg-center border-0 mb-5" id="myTab" role="tablist">
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ ($categoryId ?? 1) == 1 ? 'active' : '' }}" href="{{ route('front.our-division.category', ['divisionID' => $divisionID ,'categoryId' => 1 ]) }}" type="button">Neuro Psychiatric Range</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ ($categoryId ?? 1) == 2 ? 'active' : '' }}" href="{{ route('front.our-division.category', ['divisionID' => $divisionID ,'categoryId' => 2 ]) }}" type="button">Cardiac Diabetic Range</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ ($categoryId ?? 1) == 3 ? 'active' : '' }}" href="{{ route('front.our-division.category', ['divisionID' => $divisionID ,'categoryId' => 3 ]) }}" type="button">General Range</a>
													</li>
												</ul>

												<div class="tab-content accordion myTabContent-inner" id="">
													<div class="tab-pane fade show active accordion-item border-0"
														id="neuro-pSychatrist-range-tab-pane" role="tabpanel"
														aria-labelledby="neuro-pSychatrist-range-tab" tabindex="0">
														<div class="accordion-header d-lg-none" id="headinginnerOne">
															<button class="accordion-button" type="button"
																data-bs-toggle="collapse" data-bs-target="#collapseinnerOne"
																aria-expanded="true" aria-controls="collapseinnerOne">Neuro
																PSychatrist Range</button>
														</div>
														<div id="collapseinnerOne"
															class="accordion-collapse collapse show d-lg-block"
															aria-labelledby="headinginnerOne"
															data-bs-parent=".myTabContent-inner">
															<div class="accordion-body p-0">

																<div class="product_grid_division">
																	<div class="row">
																		@foreach($products as $product)
																			<div class="col-md-4 col-sm-6">
																				<div class="product_division_box">
                                                                                    <div class="product_image_division_size">
																					    <img src="{{ URL::asset('storage/app/public/uploads/OurDivisionPageProductImage') }}/{{ $product['image'] }}" class="img-fluid w-100" alt="">
                                                                                    </div>
																					<h5>{!! $product->title !!}</h5>
																					<a href="#" class="btn button-dark" data-bs-toggle="modal" data-bs-target=".broucher-form-pdf">Download Catalogue</a>
																				</div>
																			</div>
																		@endforeach
																	</div>
																</div>
																<!--=============== our-division Pagenation start ===========-->
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

																				@for ($i = $start; $i <= $end; $i++)
																					<li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
																						<a class="page-link number-pagination" href="{{ $products->url($i) }}">{{ $i }}</a>
																					</li>
																				@endfor

																				@if ($end < $totalPages)
																					<li class="page-item disabled">
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
																<!--=============== our-division Pagenation end ===========-->
															</div>
														</div>
													</div>

												</div>

											</div>
											<!-- Inner Tabs End -->
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				<!--=============== our-division rigth end =======-->
			</div>
			<div class="modal fade broucher-form-pdf" id="broucherFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="broucher-formLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="broucher-formLabel">Download PDF</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="broucher-download-popup-form">
								<form id="downloadPdfForm" action="{{ route('front.our-division.downloadPdf') }}" method="POST">
									@csrf
									<input type="hidden" name="division_id" value="{{ $divisionID ?? Request::segment(2) }}" />
									<input type="hidden" name="category_id" value="{{$categoryId}}" />
									<div class="form-group">
										<label for="">Enter Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
									</div>
									<div class="form-group">
										<label for="">Enter Email</label>
										<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
									</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn button-dark">Submit</button>
						</div>
						</form>
					</div>
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
						@foreach ($proudMember as $image)
						<div class="swiper-slide">
							<div class="img-logo-box-partner">
								<img src="{{ URL::asset('storage/app/public/uploads/ProudMembers') }}/{{ $image['image'] }}" class="img-fluid">
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

	@include('Front.Layout.becomefranchoer_popup')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		// PDF not found hide msg
		$(document).ready(function() {
			setTimeout(function(){
				document.getElementById('error-msg').style.display = 'none';
			}, 5000);
		});
		// PDF Download to pop-up hide
		document.addEventListener("DOMContentLoaded", function () {
			document.getElementById("downloadPdfForm").addEventListener("submit", function (event) {
				$('#broucherFormModal').modal('hide');
			});
		});
	</script>
@endsection
