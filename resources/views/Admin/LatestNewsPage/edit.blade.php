@extends('Admin.include.masterLayout')
@section('title')
    Latest News Page
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
                                Edit Latest News Page
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
                        @if (isset($blogPage))
                            {!! Form::open([
                                'route' => 'admin.latestNewsPage.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($blogPage)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.latestNewsPage.update',
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
                                            if (isset($blogPage->banner_image) && !empty($blogPage->banner_image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/latestNewsPage/banner_image') . '/' . $blogPage->banner_image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_banner_image" id="old_banner_image"
                                                value="{{ isset($blogPage->banner_image) && !empty($blogPage->banner_image) ? $blogPage->banner_image : '' }}">
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
                                {!! Form::textarea('banner_title', isset($blogPage->banner_title) ? $blogPage->banner_title : '', [
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

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="banner_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Banner Description
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'banner_description',
                                    isset($blogPage->banner_description) ? $blogPage->banner_description : '',
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






                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($blogPage) && $blogPage->count() > 0)
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



            var isBannerImageUploded = $('#old_banner_image').val() ? true : false;
            // var isBlogListBannerImageUploded = $('#blog_list_old_banner_image').val() ? true : false;

            $('#form').validate({
                ignore: [],
                rules: {
                    'banner_title': {
                        // required: function() {
                        //     var editor = CKEDITOR.instances.banner_description;
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
