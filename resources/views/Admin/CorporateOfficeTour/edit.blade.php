@extends('Admin.include.masterLayout')
@section('title')
    Corporate Office Tour
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
                                Edit Corporate Office Tour
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
                        @if (isset($corporateOfficeTour))
                            {!! Form::open([
                                'route' => 'admin.corporateofficetour.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($corporateOfficeTour)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.corporateofficetour.update',
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
                                            if (isset($corporateOfficeTour->banner_image) && !empty($corporateOfficeTour->banner_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/corporateofficetour/banner_image') . '/' . $corporateOfficeTour->banner_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_banner_image" id="old_banner_image"
                                                value="{{ isset($corporateOfficeTour->banner_image) && !empty($corporateOfficeTour->banner_image) ? $corporateOfficeTour->banner_image : '' }}">
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
                                    isset($corporateOfficeTour->banner_title) ? $corporateOfficeTour->banner_title : '',
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
                                    isset($corporateOfficeTour->banner_description) ? $corporateOfficeTour->banner_description : '',
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
                                <label for="welcome_video_url" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Welcome Video URL<span style="color:red" class="required">*</span>
                                    <br> <span class="fs-10">(Please copy url from youtube embed video src)</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'welcome_video_url',
                                    isset($corporateOfficeTour->welcome_video_url) ? $corporateOfficeTour->welcome_video_url : '',
                                    [
                                        'placeholder' => 'Enter Welcome Video URL',
                                        'id' => 'welcome_video_url',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="welcome_video_url_error" class="text-danger"> @error('welcome_video_url')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="welcome_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Welcome Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'welcome_title',
                                    isset($corporateOfficeTour->welcome_title) ? $corporateOfficeTour->welcome_title : '',
                                    [
                                        'placeholder' => 'Enter Welcome Title',
                                        'id' => 'welcome_title',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="welcome_title_error" class="text-danger"> @error('welcome_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2 border-bottom">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="welcome_description"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Welcome Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'welcome_description',
                                    isset($corporateOfficeTour->welcome_description) ? $corporateOfficeTour->welcome_description : '',
                                    [
                                        'placeholder' => 'Enter Welcome Description',
                                        'id' => 'welcome_description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="welcome_description_error" class="text-danger"> @error('welcome_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="office_map_iframe"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Office Map Iframe<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'office_map_iframe',
                                    isset($corporateOfficeTour->office_map_iframe) ? $corporateOfficeTour->office_map_iframe : '',
                                    [
                                        'placeholder' => 'Enter Office Map Iframe',
                                        'id' => 'office_map_iframe',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="office_map_iframe_error" class="text-danger"> @error('office_map_iframe')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="office_location"
                                    class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Office Location<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'office_location',
                                    isset($corporateOfficeTour->office_location) ? $corporateOfficeTour->office_location : '',
                                    [
                                        'placeholder' => 'Enter Welcome Description',
                                        'id' => 'office_location',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="office_location_error" class="text-danger"> @error('office_location')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="office_phone" class="col-form-label color-dark fs-14 fw-500 align-center">
                                     Office Phone<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'office_phone',
                                    isset($corporateOfficeTour->office_phone) ? $corporateOfficeTour->office_phone : '',
                                    [
                                        'placeholder' => 'Enter Office Phone',
                                        'id' => 'office_phone',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="office_phone_error" class="text-danger"> @error('office_phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="office_email" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Office Email<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'office_email',
                                    isset($corporateOfficeTour->office_email) ? $corporateOfficeTour->office_email : '',
                                    [
                                        'placeholder' => 'Enter Office Email',
                                        'id' => 'office_email',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="office_email_error" class="text-danger"> @error('office_email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="office_website" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Enter Office Website<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text(
                                    'office_website',
                                    isset($corporateOfficeTour->office_website) ? $corporateOfficeTour->office_website : '',
                                    [
                                        'placeholder' => 'Enter Office Website',
                                        'id' => 'office_website',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="office_website_error" class="text-danger"> @error('office_website')
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
                                        @if (isset($corporateOfficeTour) && $corporateOfficeTour->count() > 0)
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
            CKEDITOR.replace('welcome_title');
            CKEDITOR.replace('welcome_description');

            var isBannerImageUploded = $('#old_banner_image').val() ? true : false;

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
                    'welcome_video_url': {
                        required: true,
                        url: true
                    },
                    'welcome_title': {
                        required: function() {
                            var editor = CKEDITOR.instances.welcome_title;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'welcome_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.welcome_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                    'office_map_iframe': {
                        required: true,
                    },
                    'office_location': {
                        required: true,
                    },
                    'office_phone': {
                        required: true,
                    },
                    'office_email': {
                        required: true,
                    },
                    'office_website': {
                        required: true,
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
                    'welcome_video_url': {
                        required: "Please enter a welcome video url",
                        url: "Please enter valid a welcome video url",
                    },
                    'welcome_title': {
                        required: "Please enter a welcome title",
                    },
                    'welcome_description': {
                        required: "Please enter a welcome description",
                    },
                    'office_map_iframe': {
                        required: "Please enter a office map iframe",
                    },
                    'office_location': {
                        required: "Please enter a office location",
                    },
                    'office_phone': {
                        required: "Please enter a office phone",
                    },
                    'office_email': {
                        required: "Please enter a office email",
                    },
                    'office_website': {
                        required: "Please enter a office website",
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
