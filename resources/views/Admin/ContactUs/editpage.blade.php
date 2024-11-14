@extends('Admin.include.masterLayout')
@section('title')
    ContactUs Page
@endsection
@section('page_title')
    ContactUs Page
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
                            @if(isset($ContactUsPage) && !empty($ContactUsPage)) ContactUs Page Edit @else ContactUs Page Add @endif
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
                        @if (isset($ContactUsPage))
                            {!! Form::open([
                                'route' => 'admin.contactuspage.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($ContactUsPage)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.contactuspage.update',
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
                                <label for="address" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Address<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                            {!! Form::text('address', isset($ContactUsPage->address) ? $ContactUsPage->address : '', ['placeholder' => 'Enter Address', 'id' => 'address', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="address_error" class="text-danger"> @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <!-- Mobile No -->
                         <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mobile" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Mobile No.<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::number('mobile', isset($ContactUsPage->mobile) ? $ContactUsPage->mobile : '', ['placeholder' => 'Enter Mobile', 'id' => 'mobile', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="mobile_error" class="text-danger"> @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="email" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Email<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('email', isset($ContactUsPage->email) ? $ContactUsPage->email : '', ['placeholder' => 'Enter Mail', 'id' => 'email', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="email_error" class="text-danger"> @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <span class="text-danger" id="errorEmail"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="map_iframe" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Map Iframe<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'map_iframe',
                                    isset($ContactUsPage->map_iframe) ? $ContactUsPage->map_iframe : '',
                                    [
                                        'placeholder' => 'Enter Banner Description',
                                        'id' => 'map_iframe',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="map_iframe_error" class="text-danger"> @error('map_iframe')
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
                                        @if (isset($ContactUsPage) && $ContactUsPage->count() > 0)
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

            CKEDITOR.replace('map_iframe');
            // CKEDITOR.replace('address');
            $('#form').validate({
                ignore: [],
                rules: {
                    'address': {
                        required: true,
                    },
                    'mobile': {
                        required: true,
                        maxlength: 15,
                    },
                    'email': {
                        required: true,
                        email: true,
                    },
                    'map_iframe': {
                        required: function() {
                            var editor = CKEDITOR.instances.map_iframe;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                    },
                },
                messages: {
                    'address': {
                        required: "Please enter a address"
                    },
                    'mobile': {
                        required: "Please enter a mobile number",
                        minlength: "Please enter no more than 15 numbers",
                    },
                    'email': {
                        required: "Please enter a email",
                        email: "Please enter a valid email address",
                    },
                    'map_iframe': {
                        required: "Please enter a map Iframe"
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
    </script>
    </script>
@endsection
