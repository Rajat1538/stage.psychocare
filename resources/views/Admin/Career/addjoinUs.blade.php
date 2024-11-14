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
                                <a href="{{ route('admin.career.joinUs') }}">
                                    Why Join Us List
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                @if(isset($joinUsData) && !empty($joinUsData)) Why Join Us Edit @else Why Join Us Add @endif
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
                            @if (isset($joinUsData))
                                {!! Form::open([
                                    'route' => 'admin.career.updateWhyUs',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', optional($joinUsData)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @else
                                {!! Form::open([
                                    'route' => 'admin.career.storeWhyUs',
                                    'method' => 'POST',
                                    'files' => true,
                                    'class' => 'form-horizontal',
                                    'id' => 'form',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                            @endif
                            <!-- Image Upload -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="image1" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Image 1<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="account-profile mb-4">
                                        <div class="ap-img pro_img_wrapper">
                                            {!! Form::file('image1', [
                                                'id' => 'image1',
                                                'accept' => 'image/*',
                                                'class' => 'invisible',
                                                'style' => 'position: absolute;',
                                                'onchange' => 'PreviewImage(this)',
                                            ]) !!}
                                            <label for="image1">
                                                <?php
                                                    $mainImageUrl1 = URL::asset('resources/admin-asset/img/default.jpg');
                                                    if(isset($joinUsData->image1) && !empty($joinUsData->image1)){
                                                        $mainImageUrl1 = asset('storage/app/public/uploads/JoinUs').'/'.$joinUsData->image1;
                                                    }
                                                ?>
                                                <input type="hidden" name="old_image1" id="old_image1" value="{{ isset($joinUsData->image1) ? $joinUsData->image1 : '' }}">
                                                <img class="max-wh-120 card-img-top img-fluid image_preview" src="{{$mainImageUrl1}}" id="image_preview" alt="image">
                                                <span class="cross" id="remove_pro_pic">
                                                    <span data-feather="camera"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="account-profile__title">
                                            @if($errors->has('image1'))
                                                <div class="ml-20 text-danger">
                                                    {{ $errors->first('image1') }}
                                                </div>
                                            @endif
                                            <span class="text-danger ml-20" id="erroreImage1"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Image Upload -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="image2" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Image 2<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="account-profile d-flex align-items-center mb-4 ">
                                        <div class="ap-img pro_img_wrapper">
                                            {!! Form::file('image2', [
                                                'id' => 'image2',
                                                'accept' => 'image/*',
                                                'class' => 'invisible',
                                                'style' => 'position: absolute;',
                                                'onchange' => 'PreviewImage(this)',
                                            ]) !!}

                                            <label for="image2">
                                                <?php
                                                    $mainImageUrl = URL::asset('resources/admin-asset/img/default.jpg');
                                                    if(isset($joinUsData->image2) && !empty($joinUsData->image2)){
                                                        $mainImageUrl = asset('storage/app/public/uploads/JoinUs').'/'.$joinUsData->image2;
                                                    }
                                                ?>
                                                <input type="hidden" name="old_image2" id="old_image2" value="{{ isset($joinUsData->image2) ? $joinUsData->image2 : '' }}">
                                                <img class="max-wh-120 card-img-top img-fluid image_preview" src="{{$mainImageUrl}}" id="image_preview" alt="image">
                                                <span class="cross" id="remove_pro_pic">
                                                    <span data-feather="camera"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="account-profile__title">
                                            @if($errors->has('image2'))
                                                <div class="ml-20 text-danger">
                                                    {{ $errors->first('image2') }}
                                                </div>
                                            @endif
                                            <span class="text-danger ml-20" id="erroreImage2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                                        isset($joinUsData->title_1) ? $joinUsData->title_1 : '',
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
                            <!-- Description 1 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="description_1" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Description 1<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'description_1',
                                        isset($joinUsData->description_1) ? $joinUsData->description_1 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'description_1',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="description_1_error" class="text-danger"> @error('description_1')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Title 2 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_2" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Title 2 <span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_2',
                                        isset($joinUsData->title_2) ? $joinUsData->title_2 : '',
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
                            <!-- Description 2 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="description_2" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Description 2<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'description_2',
                                        isset($joinUsData->description_2) ? $joinUsData->description_2 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'description_2',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="description_2_error" class="text-danger"> @error('description_2')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Title 3 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_3" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Title 3 <span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_3',
                                        isset($joinUsData->title_3) ? $joinUsData->title_3 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'title_3',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    @if($errors->has('title_3'))
                                        <div class="text-danger">{{ $errors->first('title_3') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorTitle3"></span>
                                </div>
                            </div>
                            <!-- Description 3 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="description_3" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Description 3<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'description_3',
                                        isset($joinUsData->description_3) ? $joinUsData->description_3 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'description_3',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="description_3_error" class="text-danger"> @error('description_3')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Title 4 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="title_4" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Title 4 <span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'title_4',
                                        isset($joinUsData->title_4) ? $joinUsData->title_4 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'title_4',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    @if($errors->has('title_4'))
                                        <div class="text-danger">{{ $errors->first('title_4') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorTitle4"></span>
                                </div>
                            </div>
                            <!-- Description 4 -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="description_4" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Description 4<span style="color:red" class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::textarea(
                                        'description_4',
                                        isset($joinUsData->description_4) ? $joinUsData->description_4 : '',
                                        [
                                            'placeholder' => 'Enter Description',
                                            'id' => 'description_4',
                                            'class' => 'form-control add-another-rest',
                                        ],
                                    ) !!}
                                    <div id="description_4_error" class="text-danger"> @error('description_4')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                             <!-- Status -->
                            <div class="form-group row mb-25">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                        Status</span>
                                    </label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="custom-control custom-switch switch-primary switch-md ">
                                        <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeStatus(event.target);" {{ (isset($joinUsData->status) && $joinUsData->status == 1) || !isset($joinUsData->status) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="switch_status"></label>
                                    </div>
                                    @if($errors->has('status'))
                                        <div class="text-danger">{{ $errors->first('status') }}</div>
                                    @endif
                                    <span class="text-danger" id="errorStatus"></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row mb-0">
                                <div class="col-sm-3 label_right">
                                </div>
                                <div class="col-sm-9">
                                    <div class="layout-button mt-25">
                                        <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="manufacturing_plant_validation">@if(isset($joinUsData) && !empty($joinUsData)) {{ trans('label.save') }} @else {{ trans('label.save') }} @endif</button>
                                        <a class="btn btn-default btn-squared border-normal bg-normal px-30 " href="{{ route('admin.career.joinUs') }}">{{ trans('label.cancel') }}</a>
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
        CKEDITOR.replace('title_1');
        CKEDITOR.replace('description_1');
        CKEDITOR.replace('title_2');
        CKEDITOR.replace('description_2');
        CKEDITOR.replace('title_3');
        CKEDITOR.replace('description_3');
        CKEDITOR.replace('title_4');
        CKEDITOR.replace('description_4');
        var isImageUploded1 = $('#old_image1').val() ? true : false;
        var isImageUploded2 = $('#old_image2').val() ? true : false;
        $('#form').validate({
            ignore: [],
            rules: {
                'image1': {
                    required: !isImageUploded1,
                    extension: "png|jpg|jpeg|webp"
                },
                'image2': {
                    required: !isImageUploded2,
                    extension: "png|jpg|jpeg|webp"
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
                'description_1': {
                    required: function() {
                        var editor = CKEDITOR.instances.description_1;
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
                'description_2': {
                    required: function() {
                        var editor = CKEDITOR.instances.description_2;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'title_3': {
                    required: function() {
                        var editor = CKEDITOR.instances.title_3;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'description_3': {
                    required: function() {
                        var editor = CKEDITOR.instances.description_3;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'title_4': {
                    required: function() {
                        var editor = CKEDITOR.instances.title_4;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
                'description_4': {
                    required: function() {
                        var editor = CKEDITOR.instances.description_4;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },
            },
            messages: {
                'image1': {
                    required: "Please select an image",
                    extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                },
                'image2': {
                    required: "Please select an image",
                    extension: "Please uplo ad only image files of type: PNG, JPG, JPEG, WEBP"
                },
                'title_1': {
                    required: "Please enter a title",
                },
                'description_1': {
                    required: "Please enter a description",
                },
                'title_2': {
                    required: "Please enter a title",
                },
                'description_2': {
                    required: "Please enter a description",
                },
                'title_3': {
                    required: "Please enter a title",
                },
                'description_3': {
                    required: "Please enter a description",
                },
                'title_4': {
                    required: "Please enter a title",
                },
                'description_4': {
                    required: "Please enter a description",
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

    function PreviewImage(input) {
        if (input.files && input.files[0]) {
            if (input.files[0].type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent('.pro_img_wrapper').find('img.image_preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
 $(input).parent().parent().siblings('#' + input.name + '_error').html('')
            } else {
                $(input).parent().parent().siblings('#'+input.name+'_error').html('Please upload only image files of type: PNG, JPG, JPEG, WEBP')
                $(input).val('');
            }
        }
    }

    var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
	$('.switch-btn').each(function() {
		new Switchery($(this)[0], $(this).data());
	});

    // status change
    function changeStatus(_this) {
        var status = $(_this).prop('checked') == true ? 1 : 0;
        var $collectedIsVisible = '';
        if ($('#switch_status').is(':checked')) {
            $collectedIsVisible = $('#switch_status').attr('value', 1);
        }
        else {
            $collectedIsVisible = $('#switch_status').attr('value', 0);
        }
    }
</script>


@endsection
