@extends('Admin.include.masterLayout')
@section('title')
Our Product
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
                               Edit Our Product
                                @else
                              Add Our Product
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
                                'route' => 'admin.our_product.update_product',
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
                            {{ Form::open(['route' => 'admin.our_product.store_product', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data']) }}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex aling-items-center">
                                <label for="image" class="col-form-label color-dark fs-14 fw-500 align-center">
                                   Product Image<span style="color:red" class="required">*</span>
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
                                                $mainImageUrl = asset('storage/app/public/uploads/OurProductImage/image') . '/' . $corporateOfficeTourImage->image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" id="old_image"
                                                value="{{ isset($corporateOfficeTourImage->image) && !empty($corporateOfficeTourImage->image)? $corporateOfficeTourImage->image : '' }}">
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
                         {{-- Image Title --}}
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="product_title" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Title<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('product_title', isset($corporateOfficeTourImage->product_title) ? $corporateOfficeTourImage->product_title : '', [
                                    'placeholder' => 'Enter Product Title',
                                    'id' => 'product_title',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="product_title_error" class="text-danger"> @error('product_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                         {{-- Image Label --}}
                         <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="product_label" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Label<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('product_label', isset($corporateOfficeTourImage->product_label) ? $corporateOfficeTourImage->product_label : '', [
                                    'placeholder' => 'Enter Product Label',
                                    'id' => 'product_label',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="product_label_error" class="text-danger"> @error('product_label')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                         {{-- Packing Type --}}
                         <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="packing_type" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Packing Type<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('packing_type', isset($corporateOfficeTourImage->packing_type) ? $corporateOfficeTourImage->packing_type : '', [
                                    'placeholder' => 'Enter Product Packing Type',
                                    'id' => 'packing_type',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="packing_type_error" class="text-danger"> @error('packing_type')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Packing Size --}}
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="packing_size" class="col-form-label color-dark fs-14 fw-500 align-center">
                                  Product Packing Size<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('packing_size', isset($corporateOfficeTourImage->packing_size) ? $corporateOfficeTourImage->packing_size : '', [
                                    'placeholder' => 'Enter Product Packing Size',
                                    'id' => 'packing_size',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="packing_size_error" class="text-danger"> @error('packing_size')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="mrp" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product MRP<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('mrp', isset($corporateOfficeTourImage->mrp) ? $corporateOfficeTourImage->mrp : '', [
                                    'placeholder' => 'Enter MRP',
                                    'id' => 'mrp',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="mrp_error" class="text-danger"> @error('mrp')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="ptr" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product PTR<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('ptr', isset($corporateOfficeTourImage->ptr) ? $corporateOfficeTourImage->ptr : '', [
                                    'placeholder' => 'Enter PTR',
                                    'id' => 'ptr',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="ptr_error" class="text-danger"> @error('ptr')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="pts" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product PTS<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('pts', isset($corporateOfficeTourImage->pts) ? $corporateOfficeTourImage->pts : '', [
                                    'placeholder' => 'Enter PTS',
                                    'id' => 'pts',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="pts_error" class="text-danger"> @error('pts')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="label_2" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Brand Since<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('label_2', isset($corporateOfficeTourImage->label_2) ? $corporateOfficeTourImage->label_2 : '', [
                                    'placeholder' => 'Enter Label 2',
                                    'id' => 'label_2',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="label_2_error" class="text-danger"> @error('label_2')
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
                                <select name="division" id="division" class="form-control add-another-rest">
                                    @foreach ($division as $item)
                                        <option {{ (isset($corporateOfficeTourImage->division_id) && $corporateOfficeTourImage->division_id == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{!! strip_tags($item->title) !!}</option>
                                     @endforeach
                                </select>
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
                                    Category<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <select name="category" id="category" class="form-control add-another-rest">
                                    <option>{{isset($category->category_name) ? $category->category_name : ''}}</option>
                                </select>
                                <div id="category_error" class="text-danger"> @error('category')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="composition" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Composition<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('composition', isset($corporateOfficeTourImage->composition) ? $corporateOfficeTourImage->composition : '', [
                                    'placeholder' => 'Enter Composition',
                                    'id' => 'composition',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="composition_error" class="text-danger"> @error('composition')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="product_description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('product_description', isset($corporateOfficeTourImage->product_description) ? $corporateOfficeTourImage->product_description : '', [
                                    'placeholder' => 'Enter Product Description',
                                    'id' => 'product_description',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="product_description_error" class="text-danger"> @error('product_description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="product_side_effect" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Side Effects<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('product_side_effect', isset($corporateOfficeTourImage->product_side_effect) ? $corporateOfficeTourImage->product_side_effect : '', [
                                    'placeholder' => 'Enter ProductS ide Effect',
                                    'id' => 'product_side_effect',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="product_side_effect_error" class="text-danger"> @error('product_side_effect')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="product_indication" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Product Indication<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('product_indication', isset($corporateOfficeTourImage->product_indication) ? $corporateOfficeTourImage->product_indication : '', [
                                    'placeholder' => 'Enter Product Indication',
                                    'id' => 'product_indication',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="product_indication_error" class="text-danger"> @error('product_indication')
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
                                        {{ (isset($corporateOfficeTourImage->status) && $corporateOfficeTourImage->status == 1) || !isset($corporateOfficeTourImage->status) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status"></label>
                                </div>
                                <div id="status_error" class="text-danger"> @error('point')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="is_new_product" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Is New Product</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center  ,">
                                <div class="custom-control  custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="is_new_product" class="custom-control-input" id="switch_status_is_new_product" onChange="changeCheckboxStatus(event.target);" {{ (isset($corporateOfficeTourImage->is_new_product) && $corporateOfficeTourImage->is_new_product == 1) || !isset($corporateOfficeTourImage->is_new_product) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status_is_new_product"></label>
                                </div>
                                @if($errors->has('is_new_product'))
                                    <div class="text-danger">{{ $errors->first('is_new_product') }}</div>
                                @endif
                                <span class="text-danger" id="errorIsNewProduct"></span>
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
                                        @if (isset($corporateOfficeTourImage) && !empty($corporateOfficeTourImage))
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
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


    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('composition');
            CKEDITOR.replace('product_description');
            CKEDITOR.replace('product_side_effect');
            CKEDITOR.replace('product_indication');

            var isImageUploded = $('#old_image').val() ? true : false;

            $('#form').validate({
                ignore: [],
                rules: {
                    'image': {
                        required: !isImageUploded,
                        extension: "png|jpg|jpeg|webp"
                    },
                    'product_label':{
                        required: true,
                    },
                    'product_title':{
                        required: true,
                    },
                    'packing_type':{
                        required: true,
                    },
                    'packing_size':{
                        required: true,
                    },
                    'category':{
                        required: true,
                    },
                    'division':{
                        required: true,
                    },
                    'mrp':{
                        required: true,
                    },
                    'ptr':{
                        required: true,
                    },
                    'pts':{
                        required: true,
                    },
                    'label_2':{
                        required: true,
                    },
                    'composition': {
                        required: function() {
                            var editor = CKEDITOR.instances.composition;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                        minlength: 5
                    },
                    'product_description': {
                        required: function() {
                            var editor = CKEDITOR.instances.product_description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                        minlength: 5
                    },
                    'product_side_effect': {
                        required: function() {
                            var editor = CKEDITOR.instances.product_side_effect;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        },
                        minlength: 5
                    },
                    'product_indication': {
                        required: function() {
                            var editor = CKEDITOR.instances.product_indication;
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
                        required: "Please select an image",
                        extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                    },
                    'product_label': {
                        required: "Please enter a Product Label",
                    },
                    'product_title': {
                        required: "Please enter a Product Title",
                    },
                    'packing_type': {
                        required: "Please enter a Packing Type",
                    },
                    'packing_size': {
                        required: "Please enter a Packin Size",
                    },
                    'category': {
                        required: "Please enter a Category",
                    },
                    'division': {
                        required: "Please enter a Division",
                    },
                    'mrp': {
                        required: "Please enter a MRP",
                    },
                    'ptr': {
                        required: "Please enter a PTR",
                    },
                    'pts': {
                        required: "Please enter a PTS",
                    },
                    'composition': {
                        required: "Please enter a Composition",
                    },
                    'label_2': {
                        required: "Please enter a Label 2",
                    },
                    'product_description': {
                        required: "Please enter a Product Description",
                    },
                    'product_side_effect': {
                        required: "Please enter a Product Side Effect",
                    },
                    'product_indication': {
                        required: "Please enter a Product Indication",
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

        function changeCheckboxStatus(_this) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            var $collectedIsVisible = '';
            if ($('#switch_status_is_new_product').is(':checked')) {
                $collectedIsVisible = $('#switch_status_is_new_product').attr('value', 1);
            }
            else {
                $collectedIsVisible = $('#switch_status_is_new_product').attr('value', 0);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#division').change(function() {
                var divisionId = $(this).val();
        
                $.ajax({
                    url: "{{ route('admin.our_product.categoryid') }}",  // Replace with your endpoint
                    type: 'POST',           // Or 'GET' if your endpoint requires a GET request
                    data: {
                        division_id: divisionId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                // Assuming response is an array of categories
                var categorySelect = $('#category'); // ID of the category select box or container
                categorySelect.empty(); // Clear existing options
                
                // Append new options
                if(response.length > 0) {
                    $.each(response, function(index, category) {
                        categorySelect.append('<option value="' + category.id + '">' + category.category_name + '</option>');
                    });
                }
            },
                    error: function(xhr, status, error) {
                        // Handle any errors
                        console.error(error);
                    }
                });
            });
        });
        </script>
        
@endsection
