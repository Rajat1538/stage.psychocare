@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.companyBackgroundAndProducts') }}
@endsection
@section('page_title')
    {{ trans('label.companyBackgroundAndProducts') }}
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
                                {{ trans('label.edit_companyBackgroundAndProducts') }}
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
                        @if (isset($companyProfile))
                            {!! Form::open([
                                'route' => 'admin.company_background_prodcuts.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($companyProfile)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.company_background_prodcuts.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Company Background Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('company_background_image', [
                                            'id' => 'company_background_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="company_background_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->company_background_image) && !empty($companyProfile->company_background_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companybackground') . '/' . $companyProfile->company_background_image;
                                            }
                                            ?>
                                            <input type="hidden" name="company_bg_image" id="company_bg_image"
                                                value="{{ $companyProfile->company_background_image }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="company_background_image_error" class="text-danger"> @error('company_background_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="company_background_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Company BackGround Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'company_background_title',
                                    isset($companyProfile->company_background_title) ? $companyProfile->company_background_title : '',
                                    [
                                        'placeholder' => 'Enter Company Background Title',
                                        'id' => 'company_background_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="company_background_title_error" class="text-danger"> @error('company_background_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="company_background_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Company BackGround Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'company_background_description',
                                    isset($companyProfile->company_background_description) ? $companyProfile->company_background_description : '',
                                    [
                                        'placeholder' => 'Enter Company Background Description',
                                        'id' => 'company_background_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="company_background_description_error" class="text-danger"> @error('company_background_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="company_background_button_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Company Background Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('company_background_button_title', isset($companyProfile->company_background_button_title) ? $companyProfile->company_background_button_title : '', [
                                    'placeholder' => 'Enter Company Background Button Title',
                                    'id' => 'company_background_button_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="company_background_button_title_error" class="text-danger"> @error('company_background_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="company_background_button_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Company Background Button Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('company_background_button_link', isset($companyProfile->company_background_button_link) ? $companyProfile->company_background_button_link : '', [
                                    'placeholder' => 'Enter Company Background Button Link',
                                    'id' => 'company_background_button_link',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="company_background_button_link_error" class="text-danger"> @error('company_background_button_link')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="products_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Products Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'products_description',
                                    isset($companyProfile->products_description) ? $companyProfile->products_description : '',
                                    [
                                        'placeholder' => 'Enter Products Description',
                                        'id' => 'products_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="products_description_error" class="text-danger"> @error('products_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="products_button_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Products Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('products_button_title', isset($companyProfile->products_button_title) ? $companyProfile->products_button_title : '', [
                                    'placeholder' => 'Enter Product Button Title',
                                    'id' => 'products_button_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="products_button_title_error" class="text-danger"> @error('products_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="products_button_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Products Button Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('products_button_link', isset($companyProfile->products_button_link) ? $companyProfile->products_button_link : '', [
                                    'placeholder' => 'Enter Products Button Link',
                                    'id' => 'products_button_link',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="products_button_link_error" class="text-danger"> @error('products_button_link')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title_one" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title One<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('title_one', isset($companyProfile->title_one) ? $companyProfile->title_one : '', [
                                    'placeholder' => 'Enter Title One',
                                    'id' => 'title_one',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="title_one_error" class="text-danger"> @error('title_one')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Image One<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('image_one', [
                                            'id' => 'image_one',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="image_one">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->image_one) && !empty($companyProfile->image_one)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companybackground/products/image_one') . '/' . $companyProfile->image_one;
                                            }
                                            ?>
                                            <input type="hidden" name="img_one" id="img_one"
                                                value="{{ $companyProfile->image_one }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="image_one_error" class="text-danger"> @error('image_one')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title_two" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title Two<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('title_two', isset($companyProfile->title_two) ? $companyProfile->title_two : '', [
                                    'placeholder' => 'Enter Title Two',
                                    'id' => 'title_two',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="title_two_error" class="text-danger"> @error('title_two')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Image Two<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('image_two', [
                                            'id' => 'image_two',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="image_two">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->image_two) && !empty($companyProfile->image_two)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companybackground/products/image_two') . '/' . $companyProfile->image_two;
                                            }
                                            ?>
                                            <input type="hidden" name="img_two" id="img_two"
                                                value="{{ $companyProfile->image_two }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="image_two_error" class="text-danger"> @error('image_two')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title_three" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title Three<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('title_three', isset($companyProfile->title_three) ? $companyProfile->title_three : '', [
                                    'placeholder' => 'Enter Title Three',
                                    'id' => 'title_three',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="title_three_error" class="text-danger"> @error('title_three')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Image Three<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('image_three', [
                                            'id' => 'image_three',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="image_three">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->image_three) && !empty($companyProfile->image_three)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companybackground/products/image_three') . '/' . $companyProfile->image_three;
                                            }
                                            ?>
                                            <input type="hidden" name="img_three" id="img_three"
                                                value="{{ $companyProfile->image_three }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="image_three_error" class="text-danger"> @error('image_three')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title_four" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title Four<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('title_four', isset($companyProfile->title_four) ? $companyProfile->title_four : '', [
                                    'placeholder' => 'Enter Title Four',
                                    'id' => 'title_four',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="title_four_error" class="text-danger"> @error('title_four')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Image Four<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('image_four', [
                                            'id' => 'image_four',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="image_four">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->image_four) && !empty($companyProfile->image_four)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companybackground/products/image_four') . '/' . $companyProfile->image_four;
                                            }
                                            ?>
                                            <input type="hidden" name="img_four" id="img_four"
                                                value="{{ $companyProfile->image_four }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="image_four_error" class="text-danger"> @error('image_four')
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

            CKEDITOR.replace('company_background_title');
            CKEDITOR.replace('company_background_description');
            CKEDITOR.replace('products_description');
            var isCompanyBackgroundImageUploded = $('#company_bg_image').val() ? true : false;
            var isImageOneUploded = $('#img_one').val() ? true : false;
            var isImageTwoUploded = $('#img_two').val() ? true : false;
            var isImageThreeUploded = $('#img_three').val() ? true : false;
            var isImageFourUploded = $('#img_four').val() ? true : false;




            $('#form').validate({
                ignore: [],
                rules: {
                    'company_background_button_title': {
                        required: true,
                        minlength: 2,
                    },
                    'company_background_button_link' : {
                        required: true,
                        url: true,
                    },
                    'company_background_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.company_background_title;
                            if (editor) {
                                // var text = editor.getData().replace(/<[^>]*>/g, '');
                                // return text.length === 0;
                                var text = editor.getData().replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').trim();
                                return text.length === 0;
                            }
                            return true;
                        },
                        // minlength: 5
                    },
                    'company_background_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.company_background_description;
                            if (editor) {
                                // var text = editor.getData().replace(/<[^>]*>/g, '');
                                // return text.length === 0;
                                var text = editor.getData().replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').trim();
                                return text.length === 0;
                            }
                            return true;
                        },
                        // minlength: 5
                    },
                    'company_background_image': {
                        required: !isCompanyBackgroundImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'image_one': {
                        required: !isImageOneUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'image_two': {
                        required: !isImageTwoUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'image_three': {
                        required: !isImageThreeUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'image_four': {
                        required: !isImageFourUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'products_description' : {
                        required: function() {
                            var editor = CKEDITOR.instances.products_description;
                            if (editor) {
                                // var text = editor.getData().replace(/<[^>]*>/g, '');
                                // return text.length === 0;
                                var text = editor.getData().replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').trim();
                                return text.length === 0;
                            }
                            return true;
                        },
                        // minlength: 5
                    },
                    'products_button_title': {
                        required: true,
                        minlength: 2,
                    },

                    'title_one': {
                        required: true,
                    },
                    'title_two': {
                        required: true,
                    },
                    'title_three': {
                        required: true,
                    },
                    'title_four': {
                        required: true,
                    },
                    'products_button_link' : {
                        required: true,
                        url: true,
                    },

                },
                messages: {
                    'company_background_button_title': {
                        required: "Please enter a company background title",
                        minlength: "Company background title must be at least 2 characters",
                    },
                    'company_background_title': {
                        required: "Please enter a company background title",
                        minlength: "Company background title must be at least 5 characters"
                    },
                    'company_background_description': {
                        required: "Please enter a company background description",
                        minlength: "Company background description must be at least 5 characters"
                    },
                    'company_background_image': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'image_one': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'image_two': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'image_three': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'image_four': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'company_background_button_link' : {
                        required: "Please enter company background button link",
                        url: "Please enter a valid URL"
                    },
                    'products_description' : {
                        required: "Please enter a products description",
                        minlength: "Products description must be at least 5 characters"
                    },
                    'products_button_title' : {
                        required: "Please enter a products button title",
                        minlength: "Products button title must be at least 2 characters",
                    },
                    'title_one' : {
                        required: "Please enter title one",
                    },
                    'title_two' : {
                        required: "Please enter title two",
                    },
                    'title_three' : {
                        required: "Please enter title three",
                    },
                    'title_four' : {
                        required: "Please enter title four",
                    },
                    'products_button_link' : {
                        required: "Please enter products button link",
                        url: "Please enter a valid URL"
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
