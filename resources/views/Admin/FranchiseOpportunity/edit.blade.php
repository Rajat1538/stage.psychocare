@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.franchiseOpportunity') }}
@endsection
@section('page_title')
    {{ trans('label.franchiseOpportunity') }}
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
                                {{ trans('label.edit_franchiseOpportunity') }}
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
                                'route' => 'admin.frenchise_opportunities.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($companyProfile)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.frenchise_opportunities.update',
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
                                <label for="button_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Button Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('button_title', isset($companyProfile->button_title) ? $companyProfile->button_title : '', [
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

                        {{-- <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="button_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Button Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('button_link', isset($companyProfile->button_link) ? $companyProfile->button_link : '', [
                                    'placeholder' => 'Enter Button Link',
                                    'id' => 'button_link',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="button_link_error" class="text-danger"> @error('button_link')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div> --}}


                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Title<span style="color:red" class="required">*</span>
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
            $.validator.addMethod("domainCheck", function(value, element) {
            var urlPattern = /^(https?:\/\/)?(?:www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+(\/\w*)*$/;
            return this.optional(element) || urlPattern.test(value);
        }, "Please enter a valid URL with a domain.");
        CKEDITOR.replace('title');

            $('#form').validate({
                ignore: [],
                rules: {
                    'button_title': {
                        required: true,
                        minlength: 2,
                    },
                    'button_link' : {
                        required: true,
                        domainCheck: true
                    },

                    'title': {
                        required: function() {
                        const editor = CKEDITOR.instances.title;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').trim();
                            return text.length === 0;
                        }
                        return true;
                    },
                    },


                },
                messages: {
                    'button_title': {
                        required: "Please enter button title",
                        minlength: "Button title must be at least 2 characters",
                    },
                    'button_link' : {
                        required: "Please enter button link",
                        domainCheck: "Please enter a valid URL with a domain"
                    },
                    'title' : {
                        required: "Please enter title",
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
