@extends('Admin.include.masterLayout')
@section('title')
    Third Party Manufacturing Banner
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
                                Edit Third Party Manufacturing Banner
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
                                'route' => 'admin.third_party_manufacturing_banner.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($companyProfile)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.third_party_manufacturing_banner.update',
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
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="image">
                                            <?php
                                            $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->image) && !empty($companyProfile->image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/thirdpartymanufacturingbanner') . '/' . $companyProfile->image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" id="old_image"
                                                value="{{ isset($companyProfile->image) && !empty($companyProfile->image) ? $companyProfile->image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainImageUrl }}" alt="image">
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

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('title', isset($companyProfile->title) ? $companyProfile->title : '', [
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

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Description
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('description', isset($companyProfile->description) ? $companyProfile->description : '', [
                                    'placeholder' => 'Enter Description',
                                    'id' => 'description',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="description_error" class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="manufacturing_image"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Manufacturing Image<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="account-profile d-flex align-items-center">
                                    <div class="ap-img pro_img_wrapper">
                                        {!! Form::file('manufacturing_image', [
                                            'id' => 'manufacturing_image',
                                            'accept' => 'image/*',
                                            'class' => 'invisible',
                                            'style' => 'position: absolute;',
                                            'onchange' => 'previewImage(this)',
                                        ]) !!}

                                        <label for="manufacturing_image">
                                            <?php
                                            $mainmanufacturing_imageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                            if (isset($companyProfile->manufacturing_image) && !empty($companyProfile->manufacturing_image)) {
                                                $mainmanufacturing_imageUrl = asset('storage/app/public/uploads/manufacturing_image') . '/' . $companyProfile->manufacturing_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_manufacturing_image"
                                                id="old_manufacturing_image"
                                                value="{{ isset($companyProfile->manufacturing_image) && !empty($companyProfile->manufacturing_image) ? $companyProfile->manufacturing_image : '' }}">
                                            <img class="max-wh-120 card-img-top img-fluid image_preview"
                                                src="{{ $mainmanufacturing_imageUrl }}" alt="image">
                                            <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="manufacturing_image_error" class="text-danger"> @error('manufacturing_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="website" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Website<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('website', isset($companyProfile->website) ? $companyProfile->website : '', [
                                    'placeholder' => 'Enter Website',
                                    'id' => 'website',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="website_error" class="text-danger">
                                    @error('website')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- ---------------- --}}

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="contactno" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Contact No.<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('contactno', isset($companyProfile->contactno) ? $companyProfile->contactno : '', [
                                    'placeholder' => 'Enter Contact No.',
                                    'id' => 'contactno',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="contactno_error" class="text-danger"> @error('contactno')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="manufacturing_title"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Manufacturing Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'manufacturing_title',
                                    isset($companyProfile->manufacturing_title) ? $companyProfile->manufacturing_title : '',
                                    [
                                        'placeholder' => 'Enter Manufacturing Title',
                                        'id' => 'manufacturing_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="manufacturing_title_error" class="text-danger">
                                    @error('manufacturing_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="manufacturing_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Manufacturing Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'manufacturing_description',
                                    isset($companyProfile->manufacturing_description) ? $companyProfile->manufacturing_description : '',
                                    [
                                        'placeholder' => 'Enter Manufacturing Description',
                                        'id' => 'manufacturing_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="manufacturing_description_error" class="text-danger">
                                    @error('manufacturing_description')
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

            CKEDITOR.replace('title');
            CKEDITOR.replace('description');
            CKEDITOR.replace('manufacturing_title');
            CKEDITOR.replace('manufacturing_description');

            var isCompanyBackgroundImageUploded = $('#old_image').val() ? true : false;
            var isPsychocareImageUploded = $('#old_manufacturing_image').val() ? true : false;
            $('#form').validate({
                ignore: [],
                rules: {
                    'image': {
                        required: !isCompanyBackgroundImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'title': {
                        // required: function() {
                        //     var editor = CKEDITOR.instances.title;
                        //     if (editor) {
                        //         var text = editor.getData().replace(/<[^>]*>/g, '');
                        //         return text.length === 0;
                        //     }
                        //     return true;
                        // },
                        minlength: 5
                    },
                    'description': {
                        // required: function() {
                        //     var editor = CKEDITOR.instances.description;
                        //     if (editor) {
                        //         var text = editor.getData().replace(/<[^>]*>/g, '');
                        //         return text.length === 0;
                        //     }
                        //     return true;
                        // },
                        minlength: 5
                    },
                    'manufacturing_image': {
                        required: !isPsychocareImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'website': {
                        required: true
                    },
                    'contactno': {
                        required: true
                    },
                    'manufacturing_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.manufacturing_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                        minlength: 5
                    },
                    'manufacturing_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.manufacturing_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                        minlength: 5
                    },

                },
                messages: {
                    'image': {
                        required: "Please upload an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'title': {
                        // required: "Please enter a title",
                        minlength: "Title must be at least 5 characters long"
                    },

                    'description': {
                        // required: "Please enter a description",
                        minlength: "Description must be at least 5 characters long"
                    },
                    'manufacturing_image': {
                        required: "Please upload an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'website': {
                        required: "Please enter a Website",
                    },

                    'contactno': {
                        required: "Please enter a Contact No.",
                    },
                    'manufacturing_title': {
                        required: "Please enter a Manufacturing title",
                        minlength: "Manufacturing Title must be at least 5 characters long"
                    },

                    'manufacturing_description': {
                        required: "Please enter a Manufacturing description",
                        minlength: "Manufacturing Description must be at least 5 characters long"
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
@endsection
