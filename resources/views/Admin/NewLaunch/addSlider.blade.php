@extends('Admin.include.masterLayout')
@section('title')
    Slider Image Add
@endsection
@section('page_title')
    Slider Image Add
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
                                <a href="{{ route('admin.newLaunch.sliderList') }}">
                                    Slider Image List
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                @if(isset($sliderData) && $sliderData->count() > 0) Slider Image Edit @else Slider Image Add @endif
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
                        @if (isset($sliderData))
                            {!! Form::open([
                                'route' => 'admin.newLaunch.updateSlider',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($sliderData)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.newLaunch.storeSlider',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif
                        <!-- Image -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('image', [
                                            'id' => 'image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'PreviewImage(this)',
                                        ]) !!}

                                        <label for="image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($sliderData->image) && !empty($sliderData->image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/newlaunch') . '/' . $sliderData->image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" id="old_image"
                                                value="{{ isset($sliderData->image) ? $sliderData->image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image" id="image_preview">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="image_error" class="text-danger"> @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Is Banner Visible CheckBox -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="is_banner" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Is Banner Visible</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="is_banner" class="custom-control-input" id="switch_status_is_banner" onChange="changeCheckboxStatus(event.target);" {{ (isset($sliderData->is_banner) && $sliderData->is_banner == 1) || !isset($sliderData->is_banner) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status_is_banner"></label>
                                </div>
                                @if($errors->has('is_banner'))
                                    <div class="text-danger">{{ $errors->first('is_banner') }}</div>
                                @endif
                                <span class="text-danger" id="errorIsbanner"></span>
                            </div>
                        </div>
                        <hr>
                        <!-- Thumb Image for Slider-->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Thumb Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('thumb_image', [
                                            'id' => 'thumb_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'PreviewImage(this)',
                                        ]) !!}

                                        <label for="thumb_image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($sliderData->thumb_image) && !empty($sliderData->thumb_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/newlaunch') . '/' . $sliderData->thumb_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_thumb_image" id="old_thumb_image"
                                                value="{{ isset($sliderData->thumb_image) ? $sliderData->thumb_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="thumb_image" id="image_preview">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="thumb_image_error" class="text-danger"> @error('thumb_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Title -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('title', isset($sliderData->title) ? $sliderData->title : '', [
                                    'placeholder' => 'Enter Title',
                                    'id' => 'title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="title_error" class="text-danger"> @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'description',
                                    isset($sliderData->description) ? $sliderData->description : '',
                                    [
                                        'placeholder' => 'Enter Description',
                                        'id' => 'description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="description_error" class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Button Title -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="button_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('button_title', isset($sliderData->button_title) ? $sliderData->button_title : '', [
                                    'placeholder' => 'Enter Button Title',
                                    'id' => 'button_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="button_title_error" class="text-danger"> @error('button_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Status</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeStatus(event.target);" {{ (isset($sliderData->status) && $sliderData->status == 1) || !isset($sliderData->status) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status"></label>
                                </div>
                                @if($errors->has('status'))
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                @endif
                                <span class="text-danger" id="errorStatus"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($sliderData) && $sliderData->count() > 0)
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.newLaunch.sliderList') }}">{{ trans('label.cancel') }}</a>
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
            CKEDITOR.replace('title');
            CKEDITOR.replace('description');
            var isImageUploded = $('#old_image').val() ? true : false;
            var isThumnImageUploded = $('#old_thumb_image').val() ? true : false;
            var isFileUploded = $('#old_pdf_file').val() ? true : false;
            $('#form').validate({
                ignore: [],
                rules: {
                    'image': {
                        required: !isImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'title': {
                        required: function() {
                            var editor = CKEDITOR.instances.title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'description': {
                        required: function() {
                            var editor = CKEDITOR.instances.description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'button_title': {
                        required: true,
                    },
                    'thumb_image': {
                        required: !isThumnImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    
                },
                messages: {
                    'image': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'title': {
                        required: "Please enter a title",
                    },
                    'description': {
                        required: "Please enter a description",
                    },
                    'button_title': {
                        required: "Please enter a button title",
                    },
                    'thumb_image': {
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
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

        function PreviewImage(input) {
            if (input.files && input.files[0]) {
                if (input.files[0].type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(input).parent('.pro_img_wrapper').find('img.image_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
 $(input).parent().parent().siblings('#' + input.name + '_error').html('')
                } else {
                    $(input).parent().parent().siblings('#'+input.name+'_error').html('Please upload only image files of type: PNG, JPG, JPEG, WEBP')
                    $(input).val('');
                }
            }
        }
        // status change
        function changeStatus(_this) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            var $collectedIsVisible = '';
            if ($('#switch_status').is(':checked')) {
                $collectedIsVisible = $('#switch_status').attr('value', 1);
            }
            else {
                $collectedIsVisible = $('#switch_status').attr('value', 0);
            }
        }
        function changeCheckboxStatus(_this) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            var $collectedIsVisible = '';
            if ($('#switch_status_is_banner').is(':checked')) {
                $collectedIsVisible = $('#switch_status_is_banner').attr('value', 1);
            }
            else {
                $collectedIsVisible = $('#switch_status_is_banner').attr('value', 0);
            }
        }
    </script>
    </script>
@endsection
