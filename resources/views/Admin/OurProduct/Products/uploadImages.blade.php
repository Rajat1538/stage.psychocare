@extends('Admin.include.masterLayout')
@section('title')
    Our Product Image
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
                                <a href="{{ route('admin.our_product.list') }}">
                                    Our Products List
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                @if (isset($corporateOfficeTourImage))
                                    Edit Our Product Image
                                @else
                                    Add Our Product Image
                                @endif
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
                        {!! Form::open([
                            'route' => 'admin.products.uploadImages.submit',
                            'method' => 'POST',
                            'files' => true,
                            'class' => 'form-horizontal',
                            'id' => 'form',
                            'enctype' => 'multipart/form-data',
                        ]) !!}

                        <div class="form-group row">
                            <div class="col-sm-3 mb-25">
                                <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center">
                                    Upload Images :
                                </label>
                            </div>
                            <div class="col-sm-12">
                                <div id="DropzoneDiv" class="dropzone"></div>
                                <span class="text-danger" id="errordropzone"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
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
                                        {{ trans('label.save') }}
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30 "
                                        href="{{ route('admin.our_product.list') }}">{{ trans('label.cancel') }}</a>
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
    <link href="{{ URL::asset('resources/admin-asset/css/dropzone.min.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ URL::asset('resources/admin-asset/js/dropzone.min.js') }}"
        type="text/javascript"></script>

    <script>
        Dropzone.autoDiscover = false;
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
    let myDropzoneObj = new Dropzone("#DropzoneDiv", {
        paramName: "file",
        params: {
            _token: csrfToken,
        },
        url: "{{ route('admin.upload.product.image') }}",
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/jpg,image/png,image/webp",
        accept: function (file, done) {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp)$/i;
            if (allowedExtensions.test(file.name)) {
                $('#errordropzone').html("");
                if (file.size <= 2 * 1024 * 1024) {
                    $('#errordropzone').html("");
                    done();
                } else {
                    $('#errordropzone').html("File size exceeds the maximum allowed limit of 2 MB.");
                    this.removeFile(file);
                }
            } else {
                $('#errordropzone').html("Invalid file extension! Only JPG, JPEG, PNG and WEBP are allowed.");
                this.removeFile(file);
                done();
            }
        },
        uploadMultiple: false,
        parallelUploads: 1,
        success: function (file, response) {
            let value = response.image;
            let id = response.id;
            file.previewElement.setAttribute('data-id', id);
        },
        error: function (file, response) {
            $('#errordropzone').html("Invalid file extension! Only JPG, JPEG, and PNG are allowed.");
            var fileRef;
            return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        removedfile: function (file) {
            let id = file.previewElement.getAttribute('data-id');
            
            $.ajax({
                url: "{{ route('admin.delete.product.image') }}",
                method: "POST",
                data: {
                    _token: csrfToken,
                    id: id
                },
                success: function (response) {
                    console.log('Image deleted successfully');
                },
                error: function (xhr, status, error) {
                $('#errordropzone').html("Error deleting image.");
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
    });
});

    </script>
@endsection
