@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.footerManagement') }}
@endsection
@section('page_title')
    {{ trans('label.footerManagement') }}
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
                                {{ trans('label.edit_footerManagement') }}
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
                                'route' => 'admin.footer.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($companyProfile)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.footer.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif



                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'description',
                                    isset($companyProfile->description) ? $companyProfile->description : '',
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

            CKEDITOR.replace('description');

            $('#form').validate({
                ignore: [],
                rules: {

                    'description': {
                        required: function() {
                            var editor = CKEDITOR.instances.description;
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


                },
                messages: {

                    'description': {
                        required: "Please enter a description",
                        minlength: "Description must be at least 5 characters"
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

        // function previewImage(input) {
        //     if (input.files && input.files[0]) {
        //         if (input.files[0].type.startsWith('image/') && isValidImageExtension(input.files[0].name)) {
        //             if (input.files[0].size <= 2 * 1024 * 1024) {
        //             var reader = new FileReader();
        //             reader.onload = function(e) {
        //                 $(input).parent('.pro_img_wrapper').find('img.image_preview').attr('src', e.target.result);
        //             };
        //             reader.readAsDataURL(input.files[0]);
        //             $(input).parent().parent().siblings('#' + input.name + '_error').html('')
        //         }else{
        //             $(input).parent().parent().siblings('#' + input.name + '_error').html(
        //             'The file size must be less than 2 MB');
        //              $(input).val(''); // Clear the input
        //         }
        //         } else {
        //             $(input).parent().parent().siblings('#' + input.name + '_error').html(
        //                 'Please upload only image files of type: PNG, JPG, JPEG, WEBP')
        //             $(input).val('');
        //         }
        //     }
        // }

        // function isValidImageExtension(fileName) {
        //     const allowedExtensions = ['webp', 'png', 'jpg', 'jpeg'];
        //     const fileExtension = fileName.split('.').pop().toLowerCase();
        //     return allowedExtensions.includes(fileExtension);
        // }
    </script>
    </script>
@endsection
