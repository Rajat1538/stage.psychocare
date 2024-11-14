@extends('Admin.include.masterLayout')
@section('title')
Visual Ads Category
@endsection
@section('page_title')
Visual Ads Category
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
                            @if (isset($visualadscategory) && !empty($visualadscategory))
                            Edit Visual Ads Category
                            @else
                            Add Visual Ads Category
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="horizontal-form">
                    <!-- Form -->
                    @if (!empty($visualadscategory))
                    {!! Form::open([
                    'route' => 'admin.visualadscategory.update',
                    'method' => 'POST',
                    'files' => true,
                    'class' => 'form-horizontal',
                    'id' => 'form',
                    'enctype' => 'multipart/form-data',
                    ]) !!}
                    {!! Form::hidden('id', isset($visualadscategory->id) ? $visualadscategory->id : '', [
                    'class' => 'form-control',
                    'id' => 'hiddenId',
                    ]) !!}
                    @else
                    {{ Form::open(['route' => 'admin.visualadscategory.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data']) }}
                    {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                    @endif

                    <div class="form-group row mb-25">
                        <div class="col-sm-3 d-flex aling-items-center">
                            <label for="pdf" class="col-form-label color-dark fs-14 fw-500 align-center">
                                PDF File<span style="color:red" class="required">*</span>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="account-profile mb-4">
                                <div class="ap-img ">
                                    {!! Form::file('pdf', [
                                    'id' => 'pdf',
                                    'accept' =>".pdf",
                                    'style' => 'position: absolute;',
                                    ]) !!}
                                    <label for="pdf">
                                        <div class="account-profile__title">
                                            <span class="text-danger ml-20" id="errorFile"></span>
                                        </div>
                                        <div id="pdf_error" class="text-danger"> @error('pdf')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </label>
                                    <?php
                                                $pdfFileName = '';
                                                if(isset($visualadscategory->pdf) && !empty($visualadscategory->pdf)){
                                                    $pdfFileName = $visualadscategory->pdf;
                                                }
                                            ?>
                                    <input type="hidden" name="pdf" id="old_pdf_file" value="{{ $pdfFileName }}">
                                    <span id="pdf" class="pdf-file-name">{{ $pdfFileName }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row mb-25">
                        <div class="col-sm-3 d-flex justify-content-end">
                            <label for="category" class="col-form-label color-dark fs-14 fw-500 align-center">
                                category Name<span style="color:red" class="required">*</span>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            {!! Form::text(
                            'category',
                            isset($visualadscategory->category) ? $visualadscategory->category : '',
                            [
                            'placeholder' => 'Enter category',
                            'id' => 'category',
                            'class' => 'form-control add-another-rest',
                            ],
                            ) !!}
                            <div id="category_error" class="text-danger"> @error('category')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="form-group row pb-2">
                        <div class="col-sm-3 d-flex justify-content-end">
                            <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Status</span>
                            </label>
                        </div>
                        <div class="col-sm-9 d-flex align-items-center">
                            <div class="custom-control custom-switch switch-primary switch-md ">
                                <input type="checkbox" name="status" class="custom-control-input" id="switch_status"
                                    onChange="changeBlogStatus(event.target);"
                                    {{ (isset($visualadscategory->status) && $visualadscategory->status == 1) || !isset($visualadscategory->status) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="switch_status"></label>
                            </div>
                            <div id="status_error" class="text-danger"> @error('point')
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
                                <button type="submit" class="btn btn-sm btn-primary btn-add px-30"
                                    id="add_blogs_validation">
                                    @if (isset($visualadscategory) && !empty($visualadscategory))
                                    {{ trans('label.update') }}
                                    @else
                                    {{ trans('label.save') }}
                                    @endif
                                </button>
                                <a class="btn btn-default btn-squared border-normal bg-normal px-30 "
                                    href="{{ route('admin.visualadscategory.list') }}">{{ trans('label.cancel') }}</a>
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

    // var isFileUploded = $('#old_pdf_file').val() ? true : false;

    // $('#form').validate({
    //     ignore: [],
    //     rules: {
    //         'pdf': {
    //         required: !isFileUploded,
    //         extension: "pdf"
    //     },
    //         'category': {
    //            required : true
    //         },

    //     },
    //     messages: {
    //         'pdf': {
    //         required: "Please select a PDF file",
    //         extension: "Please upload only PDF files"
    //     },

    //         'category': {
    //             required: 'Please enter a Category',
    //         },

    //     },
    //     errorPlacement: function(error, element) {
    //         error.addClass('invalid-feedback');
    //         $('#' + element.attr('name') + '_error').html(error)
    //     },
    //     highlight: function(element, errorClass, validClass) {
    //         $(element).addClass('is-invalid');
    //     },
    //     unhighlight: function(element, errorClass, validClass) {
    //         $(element).removeClass('is-invalid');
    //     },
    //     submitHandler: function(form) {
    //         startLoader()
    //         form.submit();
    //     }
    // });

    var isFileUploaded = $('#old_pdf_file').val() ? true : false;

    $('#form').validate({
        ignore: [],
        rules: {
            'pdf': {
                required: !isFileUploaded,
                extension: "pdf"
            },
            'category': {
                required: true
            }
        },
        messages: {
            'pdf': {
                required: "Please select a PDF file",
                extension: "Please upload only PDF files"
            },
            'category': {
                required: 'Please enter a Category'
            }
        },
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            $('#' + element.attr('name') + '_error').html(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            var fileInput = $('#pdf')[0];
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                // Check MIME type manually before submitting
                if (file.type !== 'application/pdf') {
                    alert('Only PDF files are allowed.');
                    return; // Prevent form submission
                }
            }
            startLoader();
            form.submit();
        }
    });

    $('#form').on('submit', function(e) {
        var fileInput = $('#pdf')[0];
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            if (file.type !== 'application/pdf') {
                alert('Only PDF files are allowed.');
                e.preventDefault(); // Prevent form submission
            }
        }
    });

    @php
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK) {
        $fileType = $_FILES['pdf']['type'];
        if ($fileType !== 'application/pdf') {
            echo 'Invalid file type. Only PDF files are allowed.';
            exit;
        }
        // Proceed with file processing
    } else {
        echo 'File upload error.';
    }
    @endphp

});
</script>

<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
$('.switch-btn').each(function() {
    new Switchery($(this)[0], $(this).data());
});
// status change
function changeBlogStatus(_this) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    var $collectedIsVisible = '';
    if ($('#switch_status').is(':checked')) {
        $collectedIsVisible = $('#switch_status').attr('value', 1);
    } else {
        $collectedIsVisible = $('#switch_status').attr('value', 0);
    }
}
</script>
@endsection