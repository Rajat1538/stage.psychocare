@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.companyprofile') }}
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
                                {{ trans('label.edit_companyprofile') }}
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
                                'route' => 'admin.companyprofile.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($companyProfile)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.companyprofile.update',
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
                                            if (isset($companyProfile->banner_image) && !empty($companyProfile->banner_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companyprofile/banner_image') . '/' . $companyProfile->banner_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_banner_image" id="old_banner_image"
                                                value="{{ isset($companyProfile->banner_image) && !empty($companyProfile->banner_image) ? $companyProfile->banner_image :'' }}">
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
                                {!! Form::textarea('banner_title', isset($companyProfile->banner_title) ? $companyProfile->banner_title : '', [
                                    'placeholder' => 'Enter Banner Title',
                                    'id' => 'banner_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
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
                                    isset($companyProfile->banner_description) ? $companyProfile->banner_description : '',
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
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="about_pchpl_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    About PCHPL Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'about_pchpl_title',
                                    isset($companyProfile->about_pchpl_title) ? $companyProfile->about_pchpl_title : '',
                                    [
                                        'placeholder' => 'Enter About PCHPL Title',
                                        'id' => 'about_pchpl_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="about_pchpl_title_error" class="text-danger"> @error('about_pchpl_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="about_pchpl_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    About PCHPL Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'about_pchpl_description',
                                    isset($companyProfile->about_pchpl_description) ? $companyProfile->about_pchpl_description : '',
                                    [
                                        'placeholder' => 'Enter About PCHPL Description',
                                        'id' => 'about_pchpl_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="about_pchpl_description_error" class="text-danger">
                                    @error('about_pchpl_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="video_url" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Video URL<span style="color:red" class="required">*</span>
                                    <br> <span class="fs-10">(Please copy url from youtube embed video src)</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('video_url', isset($companyProfile->video_url) ? $companyProfile->video_url : '', [
                                    'placeholder' => 'Enter Video URL',
                                    'id' => 'video_url',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="video_url_error" class="text-danger"> @error('video_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="mission_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mission Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('mission_image', [
                                            'id' => 'mission_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="mission_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->mission_image) && !empty($companyProfile->mission_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companyprofile/mission_image') . '/' . $companyProfile->mission_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_mission_image" id="old_mission_image"
                                                value="{{isset($companyProfile->mission_image) && !empty($companyProfile->mission_image) ? $companyProfile->mission_image:'' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="mission_image_error" class="text-danger"> @error('mission_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mission_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mission Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('mission_title', isset($companyProfile->mission_title) ? $companyProfile->mission_title : '', [
                                    'placeholder' => 'Enter Mission Title',
                                    'id' => 'mission_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="mission_title_error" class="text-danger"> @error('mission_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mission_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mission Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'mission_description',
                                    isset($companyProfile->mission_description) ? $companyProfile->mission_description : '',
                                    [
                                        'placeholder' => 'Enter Mission Description',
                                        'id' => 'mission_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="mission_description_error" class="text-danger"> @error('mission_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mission_button_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mission Button Title
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'mission_button_title',
                                    isset($companyProfile->mission_button_title) ? $companyProfile->mission_button_title : '',
                                    [
                                        'placeholder' => 'Enter Mission Button Title',
                                        'id' => 'mission_button_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="mission_button_title_error" class="text-danger"> @error('mission_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mission_button_url"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mission Button URL
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'mission_button_url',
                                    isset($companyProfile->mission_button_url) ? $companyProfile->mission_button_url : '',
                                    [
                                        'placeholder' => 'Enter Mission Button URL',
                                        'id' => 'mission_button_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="mission_button_url_error" class="text-danger"> @error('mission_button_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="vision_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Vision Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('vision_image', [
                                            'id' => 'vision_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="vision_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->vision_image) && !empty($companyProfile->vision_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companyprofile/vision_image') . '/' . $companyProfile->vision_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_vision_image" id="old_vision_image"
                                                value="{{isset($companyProfile->vision_image) && !empty($companyProfile->vision_image) ? $companyProfile->vision_image :'' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="vision_image_error" class="text-danger"> @error('vision_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="vision_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Vision Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('vision_title', isset($companyProfile->vision_title) ? $companyProfile->vision_title : '', [
                                    'placeholder' => 'Enter Vision Title',
                                    'id' => 'vision_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="vision_title_error" class="text-danger"> @error('vision_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="vision_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Vision Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'vision_description',
                                    isset($companyProfile->vision_description) ? $companyProfile->vision_description : '',
                                    [
                                        'placeholder' => 'Enter Vision Description',
                                        'id' => 'vision_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="vision_description_error" class="text-danger"> @error('vision_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="vision_button_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Vision Button Title
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'vision_button_title',
                                    isset($companyProfile->vision_button_title) ? $companyProfile->vision_button_title : '',
                                    [
                                        'placeholder' => 'Enter Vision Button Title',
                                        'id' => 'vision_button_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="vision_button_title_error" class="text-danger"> @error('vision_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="vision_button_url"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Vision Button URL
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'vision_button_url',
                                    isset($companyProfile->vision_button_url) ? $companyProfile->vision_button_url : '',
                                    [
                                        'placeholder' => 'Enter Vision Button URL',
                                        'id' => 'vision_button_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="vision_button_url_error" class="text-danger"> @error('vision_button_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="we_believe_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    We Believe Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('we_believe_image', [
                                            'id' => 'we_believe_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="we_believe_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->we_believe_image) && !empty($companyProfile->we_believe_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/companyprofile/we_believe_image') . '/' . $companyProfile->we_believe_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_we_believe_image" id="old_we_believe_image"
                                                value="{{isset($companyProfile->we_believe_image) && !empty($companyProfile->we_believe_image)? $companyProfile->we_believe_image:'' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="we_believe_image_error" class="text-danger"> @error('we_believe_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="we_believe_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    We Believe Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'we_believe_title',
                                    isset($companyProfile->we_believe_title) ? $companyProfile->we_believe_title : '',
                                    [
                                        'placeholder' => 'Enter We Believe Title',
                                        'id' => 'we_believe_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="we_believe_title_error" class="text-danger"> @error('we_believe_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="achievements_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Achievements Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'achievements_title',
                                    isset($companyProfile->achievements_title) ? $companyProfile->achievements_title : '',
                                    [
                                        'placeholder' => 'Enter Achievements Title',
                                        'id' => 'achievements_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="achievements_title_error" class="text-danger"> @error('achievements_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="achievements_button_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Achievements Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'achievements_button_title',
                                    isset($companyProfile->achievements_button_title) ? $companyProfile->achievements_button_title : '',
                                    [
                                        'placeholder' => 'Enter Achievements Button Title',
                                        'id' => 'achievements_button_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="achievements_button_title_error" class="text-danger">
                                    @error('achievements_button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="achievements_button_url"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Achievements Button URL<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'achievements_button_url',
                                    isset($companyProfile->achievements_button_url) ? $companyProfile->achievements_button_url : '',
                                    [
                                        'placeholder' => 'Enter Achievements Button URL',
                                        'id' => 'achievements_button_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="achievements_button_url_error" class="text-danger">
                                    @error('achievements_button_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="directors_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Directors Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'directors_title',
                                    isset($companyProfile->directors_title) ? $companyProfile->directors_title : '',
                                    [
                                        'placeholder' => 'Enter Directors Title',
                                        'id' => 'directors_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="directors_title_error" class="text-danger"> @error('directors_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="trusted_partners_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Trusted Partners Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'trusted_partners_title',
                                    isset($companyProfile->trusted_partners_title) ? $companyProfile->trusted_partners_title : '',
                                    [
                                        'placeholder' => 'Enter Trusted Partners Title',
                                        'id' => 'trusted_partners_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="trusted_partners_title_error" class="text-danger">
                                    @error('trusted_partners_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="trusted_partners_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Trusted Partners Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'trusted_partners_description',
                                    isset($companyProfile->trusted_partners_description) ? $companyProfile->trusted_partners_description : '',
                                    [
                                        'placeholder' => 'Enter Trusted Partners Description',
                                        'id' => 'trusted_partners_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="trusted_partners_description_error" class="text-danger">
                                    @error('trusted_partners_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="division_sister_concerns_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Division & Sister Concerns Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'division_sister_concerns_title',
                                    isset($companyProfile->division_sister_concerns_title) ? $companyProfile->division_sister_concerns_title : '',
                                    [
                                        'placeholder' => 'Enter Division Sister Concerns Title',
                                        'id' => 'division_sister_concerns_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="division_sister_concerns_title_error" class="text-danger">
                                    @error('division_sister_concerns_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="products_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Products Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('products_title', isset($companyProfile->products_title) ? $companyProfile->products_title : '', [
                                    'placeholder' => 'Enter Products Title',
                                    'id' => 'products_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="products_title_error" class="text-danger"> @error('products_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pchpl_team_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    PCHPL Team Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'pchpl_team_title',
                                    isset($companyProfile->pchpl_team_title) ? $companyProfile->pchpl_team_title : '',
                                    [
                                        'placeholder' => 'Enter PCHPL Team Title',
                                        'id' => 'pchpl_team_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="pchpl_team_title_error" class="text-danger"> @error('pchpl_team_title')
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

            CKEDITOR.replace('banner_description');
            
            CKEDITOR.replace('about_pchpl_description',{
                autoParagraph :false,
            });
            CKEDITOR.replace('mission_description');
            CKEDITOR.replace('vision_description');
            CKEDITOR.replace('trusted_partners_description');

            CKEDITOR.replace('banner_title');
            CKEDITOR.replace('about_pchpl_title',{
                autoParagraph :false,
            });
            CKEDITOR.replace('mission_title');
            CKEDITOR.replace('vision_title');
            CKEDITOR.replace('we_believe_title');
            CKEDITOR.replace('achievements_title');
            CKEDITOR.replace('directors_title');
            CKEDITOR.replace('trusted_partners_title');
            CKEDITOR.replace('division_sister_concerns_title');
            CKEDITOR.replace('products_title');
            CKEDITOR.replace('pchpl_team_title');

            var isBannerImageUploded = $('#old_banner_image').val() ? true : false;
            var isMissionImageUploded = $('#old_mission_image').val() ? true : false;
            var isVisionImageUploded = $('#old_vision_image').val() ? true : false;
            var isWeBelieveImageUploded = $('#old_we_believe_image').val() ? true : false;

            $('#form').validate({
                ignore: [],
                rules: {
                    'banner_title': {
                        // required: function() {
                        //     const editor = CKEDITOR.instances.banner_title;
                        //     if (editor) {
                        //         var text = editor.getData().replace(/<[^>]*>/g, '');
                        //         return text.length === 0;
                        //     }
                        //     return true;
                        // },
                    },
                    'banner_description': {
                        // required: function() {
                        //     const editor = CKEDITOR.instances.banner_description;
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
                    'about_pchpl_title': {
                        required: function() {
                            const editor = CKEDITOR.instances.about_pchpl_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'about_pchpl_description': {
                        required: function() {
                            const editor = CKEDITOR.instances.about_pchpl_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'video_url': {
                        required: true,
                        url: true,
                    },
                    'mission_title': {
                        required: function() {
                            const editor = CKEDITOR.instances.mission_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'mission_description': {
                        required: function() {
                            const editor = CKEDITOR.instances.mission_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'mission_image': {
                        required: !isMissionImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'mission_button_title': {
                        // required: true,
                    },
                    'mission_button_url': {
                        // required: true,
                        url: true
                    },
                    'vision_title': {
                        required: function() {
                            const editor = CKEDITOR.instances.vision_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'vision_description': {
                        required: function() {
                            const editor = CKEDITOR.instances.vision_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'vision_image': {
                        required: !isVisionImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'vision_button_title': {
                        // required: true,
                    },
                    'vision_button_url': {
                        // required: true,
                        url: true
                    },
                    'we_believe_title': {
                        required: function() {
                            const editor = CKEDITOR.instances.we_believe_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    
                    'we_believe_image': {
                        required: !isWeBelieveImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'achievements_title': {
                        required: function() {
                            const editor = CKEDITOR.instances.achievements_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'achievements_button_title': {
                        required: true,
                    },
                    'achievements_button_url': {
                        required: true,
                        url: true
                    },
                    'directors_title': {
                         required: function() {
                            const editor = CKEDITOR.instances.directors_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'trusted_partners_title': {
                         required: function() {
                            const editor = CKEDITOR.instances.trusted_partners_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'trusted_partners_description': {
                        required: function() {
                            const editor = CKEDITOR.instances.trusted_partners_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'division_sister_concerns_title': {
                         required: function() {
                            const editor = CKEDITOR.instances.division_sister_concerns_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'products_title': {
                         required: function() {
                            const editor = CKEDITOR.instances.products_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'pchpl_team_title': {
                         required: function() {
                            const editor = CKEDITOR.instances.pchpl_team_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
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
                    'about_pchpl_title': {
                        required: "Please enter a about PCHPL title",
                    },
                    'about_pchpl_description': {
                        required: "Please enter a about PCHPL description",
                    },
                    'video_url': {
                        required: "Please enter a video Url",
                        url: "Please enter a valid video Url",
                    },
                    'mission_title': {
                        required: "Please enter a mission title",
                    },
                    'mission_description': {
                        required: "Please enter a mission description",
                    },
                    'mission_image': {
                        required: "Please select an mission image",
                        extension: "Please upload only mission image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'mission_button_title': {
                        // required: "Please enter a mission button title",
                    },
                    'mission_button_url': {
                        // required: "Please enter a mission button url",
                        url: "Please enter valid a button url",
                    },
                    'vision_title': {
                        required: "Please enter a vision title",
                    },
                    'vision_description': {
                        required: "Please enter a vision description",
                    },
                    'vision_image': {
                        required: "Please select an vision image",
                        extension: "Please upload only vision image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'vision_button_title': {
                        // required: "Please enter a vision button title",
                    },
                    'vision_button_url': {
                        // required: "Please enter a vision button url",
                        url: "Please enter valid a vision url",
                    },
                    'we_believe_title': {
                        required: "Please enter a we believe title",
                    },
                    'we_believe_image': {
                        required: "Please select an we believe image",
                        extension: "Please upload only we believe image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'achievements_title': {
                        required: "Please enter a achievements title",
                    },
                    'achievements_button_title': {
                        required: "Please enter a achievements button title",
                    },
                    'achievements_button_url': {
                        required: "Please enter a achievements button url",
                        url: "Please enter valid a video url",
                    },
                    'directors_title': {
                        required: "Please enter a directors title",
                    },
                    'trusted_partners_title': {
                        required: "Please enter a trusted partners title",
                    },
                    'trusted_partners_description': {
                        required: "Please enter a trusted partners description",
                    },
                    'division_sister_concerns_title': {
                        required: "Please enter a division & sister concerns title",
                    },
                    'products_title': {
                        required: "Please enter a products title",
                    },
                    'pchpl_team_title': {
                        required: "Please enter a pchpl team title",
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
