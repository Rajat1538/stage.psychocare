@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.manufacturing_plant') }} @endsection
@section('page_title') {{ trans('label.manufacturing_plant') }} @endsection
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
                                {{ trans('label.edit_manufacturing_plant') }}
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
                            <!-- Form -->
                            @if (isset($ManufacturingData))
                                {!! Form::open([
                                    'route' => 'admin.manufacturingplant.update',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', optional($ManufacturingData)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @else
                                {!! Form::open([
                                    'route' => 'admin.manufacturingplant.update',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @endif
                            <!-- Banner Image Upload -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="banner_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Banner Image<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="account-profile mb-4">
                                        <div class="ap-img pro_img_wrapper">
                                            {!! Form::file('banner_image', [
                                                'id' => 'banner_image',
                                                'accept' => 'image/*',
                                                'class' => 'invisible',
                                                'style' => 'position: absolute;',
                                                'onchange' => 'PreviewImage(this)',
                                            ]) !!}
                                            <label for="banner_image">
                                                <?php
                                                    $mainbannerImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                                    if(isset($ManufacturingData->banner_image) && !empty($ManufacturingData->banner_image)){
                                                        $mainbannerImageUrl = asset('storage/app/public/uploads/ManufacturingPlant').'/'.$ManufacturingData->banner_image;
                                                    }
                                                ?>
                                                <input type="hidden" name="old_banner_image" id="old_banner_image" value="{{isset($ManufacturingData->banner_image) ? $ManufacturingData->banner_image : '' }}">

                                                <img class="max-wh-120 card-img-top img-fluid image_preview" src="{{$mainbannerImageUrl}}" id="image_preview" alt="image">
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
                            <!-- Objective Image Upload -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="objective_image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Objective Image<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="account-profile d-flex align-items-center mb-4 ">
                                        <div class="ap-img pro_img_wrapper">
                                            {!! Form::file('objective_image', [
                                                'id' => 'objective_image',
                                                'accept' => 'image/*',
                                                'class' => 'invisible',
                                                'style' => 'position: absolute;',
                                                'onchange' => 'PreviewImage(this)',
                                            ]) !!}

                                            <label for="objective_image">
                                                <?php
                                                    $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                                    if(isset($ManufacturingData->objective_image) && !empty($ManufacturingData->objective_image)){
                                                        $mainImageUrl = asset('storage/app/public/uploads/ManufacturingPlant').'/'.$ManufacturingData->objective_image;
                                                    }
                                                ?>
                                                <input type="hidden" name="old_objective_image" id="old_objective_image" value="{{isset($ManufacturingData->objective_image) ? $ManufacturingData->objective_image : '' }}">
                                                <img class="max-wh-120 card-img-top img-fluid image_preview" src="{{$mainImageUrl}}" id="image_preview" alt="image">
                                                <span class="cross" id="remove_pro_pic">
                                                    <span data-feather="camera"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="account-profile__title">
                                            @if($errors->has('objective_image'))
                                                <div class="ml-20 text-danger">
                                                    {{ $errors->first('objective_image') }}
                                                </div>
                                            @endif
                                            <span class="text-danger ml-20" id="errorObjectiveImage"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content title-->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="content_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Content Title<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea('content_title', isset($ManufacturingData->content_title) ? $ManufacturingData->content_title : '', ['placeholder' => 'Enter Title', 'id' => 'content_title', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                    @if($errors->has('content_title'))
                                        <div class="text-danger">{{ $errors->first('content_title') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorContentTitle"></span>
                                </div>
                            </div>

                            <!-- Banner title-->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="banner_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Banner Title<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea('banner_title', isset($ManufacturingData->banner_title) ? $ManufacturingData->banner_title : '', ['placeholder' => 'Enter Title', 'id' => 'banner_title', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                    @if($errors->has('banner_title'))
                                        <div class="text-danger">{{ $errors->first('banner_title') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorBannerTitle"></span>
                                </div>
                            </div>

                            <!-- Banner Description -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="banner_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Banner Description<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'banner_description',
                                        isset($ManufacturingData->banner_description) ? $ManufacturingData->banner_description : '',
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

                            <!-- Objective title-->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="objective_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Objective Title<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea('objective_title', isset($ManufacturingData->objective_title) ? $ManufacturingData->objective_title : '', ['placeholder' => 'Enter Title', 'id' => 'objective_title', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                    @if($errors->has('objective_title'))
                                        <div class="text-danger">{{ $errors->first('objective_title') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorObjectiveTitle"></span>
                                </div>
                            </div>

                            <!-- Objective Description -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="objective_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Objective Description<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'objective_description',
                                        isset($ManufacturingData->objective_description) ? $ManufacturingData->objective_description : '',
                                        [
                                            'placeholder' => 'Enter Objective Description',
                                            'id' => 'objective_description',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="objective_description_error" class="text-danger"> @error('objective_description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group row mb-0">
                                <div class="col-sm-3 label_right">
                                </div>
                                <div class="col-sm-9">
                                    <div class="layout-button mt-25">
                                        <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="manufacturing_plant_validation">@if(isset($ManufacturingData) && !empty($ManufacturingData)) {{ trans('label.save') }} @else {{ trans('label.save') }} @endif</button>
                                        <a class="btn btn-default btn-squared border-normal bg-normal px-30 " href="{{ route('admin.dashboard') }}">{{ trans('label.cancel') }}</a>
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
    $(document).ready(function () {
        CKEDITOR.replace('banner_description');
        CKEDITOR.replace('banner_title');
        CKEDITOR.replace('objective_title');
        CKEDITOR.replace('content_title');
        CKEDITOR.replace('objective_description');
        var isBannerImageUploded = $('#old_banner_image').val() ? true : false;
        var isObjectiveImageUploded = $('#old_objective_image').val() ? true : false;
        $('#form').validate({
            ignore: [],
            rules: {
                'banner_title': {
                    required: function() {
                            var editor = CKEDITOR.instances.banner_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                },
                'banner_description': {
                    required: function() {
                            var editor = CKEDITOR.instances.banner_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                },
                'banner_image': {
                    required: !isBannerImageUploded,
                    extension: "png|jpg|jpeg|webp"
                },
                'objective_title': {
                    required: function() {
                            var editor = CKEDITOR.instances.objective_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                },
                'objective_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.objective_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                },
                'objective_image': {
                    required: !isObjectiveImageUploded,
                    extension: "png|jpg|jpeg|webp"
                },
                'content_title': {
                    required: function() {
                            var editor = CKEDITOR.instances.content_title;
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
                    required: "Please enter a banner title",
                },
                'banner_description': {
                    required: "Please enter a banner description",
                },
                'objective_title': {
                    required: "Please enter a objective title",
                },
                'objective_description': {
                    required: "Please enter a objective description",
                },
                'banner_image': {
                    required: "Please select an image",
                    extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                },
                'objective_image': {
                    required: "Please select an image",
                    extension: "Please uplo ad only image files of type: PNG, JPG, JPEG, WEBP"
                },
                'content_title': {
                    required: "Please enter a content title",
                },
            },
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_error').html(error)

                if (element.attr("name") == "status") {
                    error.appendTo(element.parent().parent());
                } else {
                    error.appendTo(element.parent());
                }
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

    var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
	$('.switch-btn').each(function() {
		new Switchery($(this)[0], $(this).data());
	});
</script>


@endsection
