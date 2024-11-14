@extends('Admin.include.masterLayout')
@section('title')
    PCD Pharma Franchise
@endsection
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-horizontal card-default card-md mb-4">
                <div class="card-body py-md-30">
                    <div class="card card-default card-md mb-4">
                        <ul class="atbd-breadcrumb nav">
                            <li class="atbd-breadcrumb__item">
                                <a href="{{ route('admin.dashboard') }}">
                                    {{ trans('label.home') }}
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                            </li>
                            <li class="atbd-breadcrumb__item">
                                Edit PCD Pharma Franchise
                            </li>
                        </ul>
                    </div>
                    @if ($message = Session::get('alert-success'))
                        <div class="alert alert-success" style="display: block;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('alert-error'))
                        <div class="alert alert-danger" style="display: block;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="horizontal-form">
                        @if (isset($pcdPharmaFranchise))
                            {!! Form::open([
                                'route' => 'admin.pcdpharmafranchise.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($pcdPharmaFranchise)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.pcdpharmafranchise.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="banner_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Banner Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('banner_image', [
                                            'id' => 'banner_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="banner_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($pcdPharmaFranchise->banner_image) && !empty($pcdPharmaFranchise->banner_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/pcdpharmafranchise/banner_image') . '/' . $pcdPharmaFranchise->banner_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_banner_image" id="old_banner_image"
                                                value="{{ isset($pcdPharmaFranchise->banner_image) && !empty($pcdPharmaFranchise->banner_image) ? $pcdPharmaFranchise->banner_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="banner_image_error" class="text-danger"> @error('banner_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="banner_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Banner Title
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'banner_title',
                                    isset($pcdPharmaFranchise->banner_title) ? $pcdPharmaFranchise->banner_title : '',
                                    [
                                        'placeholder' => 'Enter Banner Title',
                                        'id' => 'banner_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="banner_title_error" class="text-danger"> @error('banner_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="banner_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Banner Description
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'banner_description',
                                    isset($pcdPharmaFranchise->banner_description) ? $pcdPharmaFranchise->banner_description : '',
                                    [
                                        'placeholder' => 'Enter Banner Description',
                                        'id' => 'banner_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="banner_description_error" class="text-danger"> @error('banner_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="pharma_franchise_image"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Pharma Franchise Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('pharma_franchise_image', [
                                            'id' => 'pharma_franchise_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="pharma_franchise_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($pcdPharmaFranchise->pharma_franchise_image) && !empty($pcdPharmaFranchise->pharma_franchise_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/pcdpharmafranchise/pharma_franchise_image') . '/' . $pcdPharmaFranchise->pharma_franchise_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_pharma_franchise_image"
                                                id="old_pharma_franchise_image"
                                                value="{{ isset($pcdPharmaFranchise->pharma_franchise_image) && !empty($pcdPharmaFranchise->pharma_franchise_image) ? $pcdPharmaFranchise->pharma_franchise_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="pharma_franchise_image_error" class="text-danger"> @error('pharma_franchise_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pharma_franchise_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Pharma Franchise Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'pharma_franchise_title',
                                    isset($pcdPharmaFranchise->pharma_franchise_title) ? $pcdPharmaFranchise->pharma_franchise_title : '',
                                    [
                                        'placeholder' => 'Enter Pharma Franchise Title',
                                        'id' => 'pharma_franchise_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pharma_franchise_title_error" class="text-danger"> @error('pharma_franchise_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pharma_franchise_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Pharma Franchise Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'pharma_franchise_description',
                                    isset($pcdPharmaFranchise->pharma_franchise_description) ? $pcdPharmaFranchise->pharma_franchise_description : '',
                                    [
                                        'placeholder' => 'Enter Pharma Franchise Description',
                                        'id' => 'pharma_franchise_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pharma_franchise_description_error" class="text-danger">
                                    @error('pharma_franchise_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pharma_franchise_button_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Pharma Franchise Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'pharma_franchise_button_title',
                                    isset($pcdPharmaFranchise->pharma_franchise_button_title) ? $pcdPharmaFranchise->pharma_franchise_button_title : '',
                                    [
                                        'placeholder' => 'Enter Pharma Franchise Button Title',
                                        'id' => 'pharma_franchise_button_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pharma_franchise_button_title_error" class="text-danger">
                                    @error('pharma_franchise_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pharma_franchise_button_url"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Pharma Franchise Button URL<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'pharma_franchise_button_url',
                                    isset($pcdPharmaFranchise->pharma_franchise_button_url) ? $pcdPharmaFranchise->pharma_franchise_button_url : '',
                                    [
                                        'placeholder' => 'Enter Pharma Franchise Button URL',
                                        'id' => 'pharma_franchise_button_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pharma_franchise_button_url_error" class="text-danger">
                                    @error('pharma_franchise_button_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="pcd_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCD Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('pcd_image', [
                                            'id' => 'pcd_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="pcd_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($pcdPharmaFranchise->pcd_image) && !empty($pcdPharmaFranchise->pcd_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/pcdpharmafranchise/pcd_image') . '/' . $pcdPharmaFranchise->pcd_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_pcd_image" id="old_pcd_image"
                                                value="{{ isset($pcdPharmaFranchise->pcd_image) && !empty($pcdPharmaFranchise->pcd_image) ? $pcdPharmaFranchise->pcd_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="pcd_image_error" class="text-danger"> @error('pcd_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pcd_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCD Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('pcd_title', isset($pcdPharmaFranchise->pcd_title) ? $pcdPharmaFranchise->pcd_title : '', [
                                    'placeholder' => 'Enter PCD Title',
                                    'id' => 'pcd_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="pcd_title_error" class="text-danger"> @error('pcd_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pcd_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCD Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'pcd_description',
                                    isset($pcdPharmaFranchise->pcd_description) ? $pcdPharmaFranchise->pcd_description : '',
                                    [
                                        'placeholder' => 'Enter PCD Description',
                                        'id' => 'pcd_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pcd_description_error" class="text-danger"> @error('pcd_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pcd_visit" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCD Visit Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('pcd_visit', isset($pcdPharmaFranchise->pcd_visit) ? $pcdPharmaFranchise->pcd_visit : '', [
                                    'placeholder' => 'Enter PCD Visit Link',
                                    'id' => 'pcd_visit',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="pcd_visit_error" class="text-danger"> @error('pcd_visit')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pcd_call" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCD Call<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('pcd_call', isset($pcdPharmaFranchise->pcd_call) ? $pcdPharmaFranchise->pcd_call : '', [
                                    'placeholder' => 'Enter PCD Call',
                                    'id' => 'pcd_call',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="pcd_call_error" class="text-danger"> @error('pcd_call')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'journey_title',
                                    isset($pcdPharmaFranchise->journey_title) ? $pcdPharmaFranchise->journey_title : '',
                                    [
                                        'placeholder' => 'Enter Journey Title',
                                        'id' => 'journey_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_title_error" class="text-danger"> @error('journey_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_customers"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey customers<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'journey_customers',
                                    isset($pcdPharmaFranchise->journey_customers) ? $pcdPharmaFranchise->journey_customers : '',
                                    [
                                        'placeholder' => 'Enter Journey customers',
                                        'id' => 'journey_customers',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_customers_error" class="text-danger"> @error('journey_customers')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_manufacturing_facilities"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Manufacturers<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'journey_manufacturing_facilities',
                                    isset($pcdPharmaFranchise->journey_manufacturing_facilities)
                                        ? $pcdPharmaFranchise->journey_manufacturing_facilities
                                        : '',
                                    [
                                        'placeholder' => 'Enter Journey Manufacturers',
                                        'id' => 'journey_manufacturing_facilities',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_manufacturing_facilities_error" class="text-danger">
                                    @error('journey_manufacturing_facilities')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_sku" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey SKU<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('journey_sku', isset($pcdPharmaFranchise->journey_sku) ? $pcdPharmaFranchise->journey_sku : '', [
                                    'placeholder' => 'Enter Journey SKU',
                                    'id' => 'journey_sku',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="journey_sku_error" class="text-danger"> @error('journey_sku')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_employees"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey Employees<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'journey_employees',
                                    isset($pcdPharmaFranchise->journey_employees) ? $pcdPharmaFranchise->journey_employees : '',
                                    [
                                        'placeholder' => 'Enter Journey Employees',
                                        'id' => 'journey_employees',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_employees_error" class="text-danger"> @error('journey_employees')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_button_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'journey_button_title',
                                    isset($pcdPharmaFranchise->journey_button_title) ? $pcdPharmaFranchise->journey_button_title : '',
                                    [
                                        'placeholder' => 'Enter Journey Button Title',
                                        'id' => 'journey_button_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_button_title_error" class="text-danger"> @error('journey_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="journey_button_url"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Journey Button URL<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'journey_button_url',
                                    isset($pcdPharmaFranchise->journey_button_url) ? $pcdPharmaFranchise->journey_button_url : '',
                                    [
                                        'placeholder' => 'Enter Journey Button URL',
                                        'id' => 'journey_button_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="journey_button_url_error" class="text-danger"> @error('journey_button_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="psychocare_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Psychocare Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('psychocare_image', [
                                            'id' => 'psychocare_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="psychocare_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($pcdPharmaFranchise->psychocare_image) && !empty($pcdPharmaFranchise->psychocare_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/pcdpharmafranchise/psychocare_image') . '/' . $pcdPharmaFranchise->psychocare_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_psychocare_image" id="old_psychocare_image"
                                                value="{{ isset($pcdPharmaFranchise->psychocare_image) && !empty($pcdPharmaFranchise->psychocare_image) ? $pcdPharmaFranchise->psychocare_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="psychocare_image_error" class="text-danger"> @error('psychocare_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="psychocare_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Psychocare Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'psychocare_title',
                                    isset($pcdPharmaFranchise->psychocare_title) ? $pcdPharmaFranchise->psychocare_title : '',
                                    [
                                        'placeholder' => 'Enter Psychocare Title',
                                        'id' => 'psychocare_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="psychocare_title_error" class="text-danger"> @error('psychocare_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="psychocare_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Psychocare Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'psychocare_description',
                                    isset($pcdPharmaFranchise->psychocare_description) ? $pcdPharmaFranchise->psychocare_description : '',
                                    [
                                        'placeholder' => 'Enter Psychocare Description',
                                        'id' => 'psychocare_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="psychocare_description_error" class="text-danger">
                                    @error('psychocare_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($companyProfile) && $companyProfile->count() > 0)
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.dashboard') }}">{{ trans('label.cancel') }}</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            CKEDITOR.replace('banner_title');
            CKEDITOR.replace('banner_description');
            CKEDITOR.replace('pharma_franchise_title');
            CKEDITOR.replace('pharma_franchise_description');
            CKEDITOR.replace('pcd_title');
            CKEDITOR.replace('pcd_description');
            CKEDITOR.replace('psychocare_title');
            CKEDITOR.replace('psychocare_description');
            CKEDITOR.replace('journey_title');

            var isBannerImageUploded = $('#old_banner_image').val() ? true : false;
            var isPharmaFranchiseImageUploded = $('#old_pharma_franchise_image').val() ? true : false;
            var isPcdImageUploded = $('#old_pcd_image').val() ? true : false;
            var isPsychocareImageUploded = $('#old_psychocare_image').val() ? true : false;

            $('#form').validate({
                ignore: [],
                rules: {
                    'banner_title': {
                        // required: function() {
                        //     var editor = CKEDITOR.instances.banner_title;
                        //     if (editor) {
                        //         var text = editor.getData().replace(/<[^>]*>/g, '');
                        //         return text.length === 0;
                        //     }
                        //     return true;
                        // },
                    },
                    'banner_description': {
                        // required: function() {
                        //     var editor = CKEDITOR.instances.banner_description;
                        //     if (editor) {
                        //         var text = editor.getData().replace(/<[^>]*>/g, '');
                        //         return text.length === 0;
                        //     }
                        //     return true;
                        // },
                    },
                    'banner_image': {
                        required: !isBannerImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'pharma_franchise_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.pharma_franchise_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'pharma_franchise_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.pharma_franchise_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'pharma_franchise_image': {
                        required: !isPharmaFranchiseImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'pharma_franchise_button_title': {
                        required: true,
                    },
                    'pharma_franchise_button_url': {
                        required: true,
                        url: true
                    },
                    'pcd_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.pcd_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'pcd_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.pcd_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'pcd_image': {
                        required: !isPcdImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    // 'pcd_visit': {
                    //     required: true,
                    //     url: true
                    // },
                    // 'pcd_call': {
                    //     required: true,
                    // },
                    'psychocare_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.psychocare_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'psychocare_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.psychocare_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'psychocare_image': {
                        required: !isPsychocareImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'journey_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.journey_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'journey_customers': {
                        required: true
                    },
                    'journey_manufacturing_facilities': {
                        required: true
                    },
                    'journey_sku': {
                        required: true
                    },
                    'journey_employees': {
                        required: true
                    },
                    'journey_button_title': {
                        required: true
                    },
                    'journey_button_url': {
                        required: true,
                        url: true
                    },
                },
                messages: {
                    'banner_title': {
                        // required: "Please enter a banner title",
                    },
                    'banner_description': {
                        // required: "Please enter a banner description",
                    },
                    'banner_image': {
                        required: "Please select an banner image",
                        extension: "Please upload only banner image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'pharma_franchise_title': {
                        required: "Please enter a pharma franchise title",
                    },
                    'pharma_franchise_description': {
                        required: "Please enter a pharma franchise description",
                    },
                    'pharma_franchise_image': {
                        required: "Please select an pharma franchise image",
                        extension: "Please upload only pharma franchise image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'pharma_franchise_button_title': {
                        required: "Please enter a pharma franchise button title",
                    },
                    'pharma_franchise_button_url': {
                        required: "Please enter a pharma franchise button url",
                        url: "Please enter valid a pharma franchise button url",
                    },
                    'pcd_title': {
                        required: "Please enter a pcd title",
                    },
                    'pcd_description': {
                        required: "Please enter a pcd description",
                    },
                    'pcd_image': {
                        required: "Please select an pcd image",
                        extension: "Please upload only pcd image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    // 'pcd_visit': {
                    //     required: "Please enter a pcd visit link",
                    //     url: "Please enter valid a pcd visit link",
                    // },
                    // 'pcd_call': {
                    //     required: "Please enter a pcd call",
                    // },
                    'psychocare_title': {
                        required: "Please enter a psychocare title",
                    },
                    'psychocare_description': {
                        required: "Please enter a psychocare description",
                    },
                    'psychocare_image': {
                        required: "Please select an psychocare image",
                        extension: "Please upload only psychocare image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'journey_title': {
                        required: "Please enter a journey title",
                    },
                    'journey_customers': {
                        required: "Please enter a journey customers",
                    },
                    'journey_manufacturing_facilities': {
                        required: "Please enter a journey Manufacturers",
                    },
                    'journey_sku': {
                        required: "Please enter a journey sku",
                    },
                    'journey_employees': {
                        required: "Please enter a journey employees",
                    },
                    'journey_button_title': {
                        required: "Please enter a journey button title",
                    },
                    'journey_button_url': {
                        required: "Please enter a journey customers",
                        url: "Please enter a valid journey button url"
                    },
                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    $('#' + element.attr('name') + '_error').html(error)
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    startLoader()
                    form.submit();
                }
            });
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                if (input.files[0].type.startsWith('image/') && isValidImageExtension(input.files[0].name)) {
                    if (input.files[0].size <= 2 * 1024 * 1024) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(input).parent('.pro_img_wrapper').find('img.image_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
 $(input).parent().parent().siblings('#' + input.name + '_error').html('')
                }else{
                    $(input).parent().parent().siblings('#' + input.name + '_error').html(
                    'The file size must be less than 2 MB');
                     $(input).val(''); // Clear the input
                }
                } else {
                    $(input).parent().parent().siblings('#' + input.name + '_error').html(
                        'Please upload only image files of type: PNG, JPG, JPEG, WEBP')
                    $(input).val('');
                }
            }
        }

        function isValidImageExtension(fileName) {
            const allowedExtensions = ['webp', 'png', 'jpg', 'jpeg'];
            const fileExtension = fileName.split('.').pop().toLowerCase();
            return allowedExtensions.includes(fileExtension);
        }
    </script>
    </script>
@endsection
