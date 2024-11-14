@extends('Admin.include.masterLayout')
@section('title') Join Us @endsection
@section('page_title') Join Us @endsection
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
                                @if(isset($termsPage) && $termsPage->count() > 0) T&C Page Edit @else T&C Page Add @endif
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
                            @if (isset($termsPage))
                                {!! Form::open([
                                    'route' => 'admin.termspage.update',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', optional($termsPage)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @else
                                {!! Form::open([
                                    'route' => 'admin.termspage.update',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @endif
                            <!-- Title 1-->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_1" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Title 1<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_1',
                                        isset($termsPage->title_1) ? $termsPage->title_1 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'title_1',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    @if($errors->has('title_1'))
                                        <div class="text-danger">{{ $errors->first('title_1') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorTitle1"></span>
                                </div>
                            </div>
                            
                            <!-- File Title -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="terms_file_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                       File Title <span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'terms_file_title',
                                        isset($termsPage->terms_file_title) ? $termsPage->terms_file_title : '',
                                        [
                                            'placeholder' => 'Enter File Title',
                                            'id' => 'terms_file_title',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    @if($errors->has('terms_file_title'))
                                        <div class="text-danger">{{ $errors->first('terms_file_title') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorTermsFileTitle"></span>
                                </div>
                            </div>
                            <!-- PDF Upload -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="terms_file_name" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        PDF File<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="account-profile mb-4">
                                        <div class="ap-img pro_img_wrapper">
                                            {!! Form::file('terms_file_name', [
                                                'id' => 'terms_file_name',
                                                'style' => 'position: absolute;',
                                            ]) !!}
                                            <label for="terms_file_name">
                                                <div class="account-profile__title">
                                                    <span class="text-danger ml-20" id="errorFile"></span>
                                                </div>
                                                <div id="terms_file_name_error" class="text-danger"> @error('terms_file_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </label>
                                                <?php
                                                    $pdfFileName = '';
                                                    if(isset($termsPage->terms_file_name) && !empty($termsPage->terms_file_name)){
                                                        $pdfFileName = $termsPage->terms_file_name;
                                                    }
                                                ?>
                                                <input type="hidden" name="terms_file_name" id="old_pdf_file" value="{{ $pdfFileName }}">
                                                <span id="terms_file_name" class="pdf-file-name">{{ $pdfFileName }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Title 3 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_2" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Title 2 <span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_2',
                                        isset($termsPage->title_2) ? $termsPage->title_2 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'title_2',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    @if($errors->has('title_2'))
                                        <div class="text-danger">{{ $errors->first('title_2') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorTitle2"></span>
                                </div>
                            </div>
                            <!-- Description 3 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_2_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Description 2<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_2_description',
                                        isset($termsPage->title_2_description) ? $termsPage->title_2_description : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'title_2_description',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="title_2_description_error" class="text-danger"> @error('title_2_description')
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
                                        <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="manufacturing_plant_validation">@if(isset($termsPage) && !empty($termsPage)) {{ trans('label.update') }} @else {{ trans('label.save') }} @endif</button>
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
        var isFileUploded = $('#old_pdf_file').val() ? true : false;
        CKEDITOR.replace('title_1');
        CKEDITOR.replace('title_2');
        CKEDITOR.replace('title_2_description');
        CKEDITOR.replace('terms_file_title');

        $('#form').validate({
            ignore: [],
            rules: {
                'terms_file_name': {
                    required: !isFileUploded,
                    extension: "pdf"
                },
                'title_1': {
                    required: function() {
                        var editor = CKEDITOR.instances.title_1;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                
                'title_2': {
                    required: function() {
                        var editor = CKEDITOR.instances.title_2;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'title_2_description': {
                    required: function() {
                        var editor = CKEDITOR.instances.title_2_description;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'terms_file_title': {
                    required: function() {
                        var editor = CKEDITOR.instances.terms_file_title;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
            },
            messages: {
                'terms_file_name': {
                    required: "Please select a PDF file",
                    extension: "Please upload only PDF files"
                },
                'title_1': {
                    required: "Please enter a title",
                },
                
                'title_2': {
                    required: "Please enter a title",
                },
                'title_2_description': {
                    required: "Please enter a description",
                },
                'terms_file_title': {
                    required: "Please enter a title",
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

</script>


@endsection
