@extends('Admin.include.masterLayout')
@section('title')
Our Division Products
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
                            <a href="{{ route('admin.ourDivision_page_product.list_product') }}">
                                Our Division Products List
                            </a>
                            <span class="breadcrumb__seperator">
                                <span class="la la-angle-right"></span>
                            </span>
                        </li>
                        <li class="atbd-breadcrumb__item">
                            @if (isset($corporateOfficeTourImage))
                            Edit Our Division Products
                            @else
                            Add Our Division Products
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
                    @if (!empty($corporateOfficeTourImage))
                    {!! Form::open([
                    'route' => 'admin.ourDivision_page_product.update_product',
                    'method' => 'POST',
                    'files' => true,
                    'class' => 'form-horizontal',
                    'id' => 'form',
                    'enctype' => 'multipart/form-data',
                    ]) !!}
                    {!! Form::hidden('id', isset($corporateOfficeTourImage->id) ? $corporateOfficeTourImage->id : '', [
                    'class' => 'form-control',
                    'id' => 'hiddenId',
                    ]) !!}
                    @else
                    {{ Form::open(['route' => 'admin.ourDivision_page_product.store_product', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data']) }}
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
                                            if (isset($corporateOfficeTourImage->image) && !empty($corporateOfficeTourImage->image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/OurDivisionPageProductImage') . '/' . $corporateOfficeTourImage->image;
                                            }
                                            ?>
                                        <input type="hidden" name="old_image" id="old_image" value="{{ isset($corporateOfficeTourImage->image) && !empty($corporateOfficeTourImage->image)? $corporateOfficeTourImage->image : '' }}">
                                        <img class="max-wh-120 card-img-top img-fluid image_preview" src="{{ $mainImageUrl }}" alt="image">
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

                    <div class="form-group row mb-25">
                        <div class="col-sm-3 d-flex justify-content-end">
                            <label for="title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Title<span style="color:red" class="required">*</span>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            {!! Form::textarea('title', isset($corporateOfficeTourImage->title) ? $corporateOfficeTourImage->title : '', [
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

                    <div class="form-group row pb-2">
                        <div class="col-sm-3 d-flex justify-content-end">
                            <label for="division" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Division<span style="color:red" class="required">*</span>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            {{-- {!! Form::select('division', ['Nuero' => 'Nuero', 'Cardiac' => 'Cardiac','General' => 'General'   ], isset($corporateOfficeTourImage->division) ? $corporateOfficeTourImage->division : '', [ 'id' => 'division', 'class' => 'form-control add-another-rest']) !!}
                                <div id="division_error" class="text-danger"> @error('division')
                                        {{ $message }}
                            @enderror
                        </div> --}}
                        {!! Form::select('division', $division->pluck('title', 'title'), isset($corporateOfficeTourImage->division) ? $corporateOfficeTourImage->division : '', ['id' => 'division', 'class' => 'form-control add-another-rest']) !!}
                        <div id="division_error" class="text-danger">
                            @error('division')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-2">
                    <div class="col-sm-3 d-flex justify-content-end">
                        <label for="category" class="col-form-label color-dark fs-14 fw-500 align-center">
                            Sub Division<span style="color:red" class="required">*</span>
                        </label>
                    </div>
                    {{-- <div class="col-sm-9">
								{!! Form::select('category', ['Nuero' => 'Nuero', 'Cardiac' => 'Cardiac','General' => 'General'   ], isset($corporateOfficeTourImage->category) ? $corporateOfficeTourImage->category : '', [ 'id' => 'category', 'class' => 'form-control add-another-rest']) !!}
                                <div id="category_error" class="text-danger"> @error('category')
                                        {{ $message }}
                    @enderror
                </div>
            </div>--}} 

            <div class="col-sm-9">
                {!! Form::select('category', ['1' => 'Neuro', '2' => 'Cardiac', '3' => 'General'], isset($corporateOfficeTourImage->category) ? $corporateOfficeTourImage->category : '', ['id' => 'category', 'class' => 'form-control add-another-rest']) !!}
                <div id="category_error" class="text-danger">
                    @error('category')
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
                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeBlogStatus(event.target);" {{ (isset($corporateOfficeTourImage->status) && $corporateOfficeTourImage->status == 1) || !isset($corporateOfficeTourImage->status) ? 'checked' : '' }}>
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
                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="add_blogs_validation">
                        @if (isset($corporateOfficeTourImage) && !empty($corporateOfficeTourImage))
                        {{ trans('label.update') }}
                        @else
                        {{ trans('label.save') }}
                        @endif
                    </button>
                    <a class="btn btn-default btn-squared border-normal bg-normal px-30 " href="{{ route('admin.ourDivision_page_product.list_product') }}">{{ trans('label.cancel') }}</a>
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
        var isImageUploded = $('#old_image').val() ? true : false;

        $('#form').validate({
            ignore: []
            , rules: {
                'image': {
                    required: !isImageUploded
                    , extension: "png|jpg|jpeg|webp"
                }
                , 'category': {
                    required: true
                , }
                , 'title': {
                    required: function() {
                        var editor = CKEDITOR.instances.title;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    }
                    , minlength: 5
                }
                , 'division': {
                    required: true
                , }
            , }
            , messages: {
                'image': {
                    required: "Please select an image"
                    , extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                }
                , 'category': {
                    required: "Please select a sub division"
                , }
                , 'title': {
                    required: 'Please enter a title'
                , }
                , 'division': {
                    required: 'Please select a division'
                , }
            , }
            , errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_error').html(error)
            }
            , highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            }
            , unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
            , submitHandler: function(form) {
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