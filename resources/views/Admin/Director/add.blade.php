@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.director') }} @endsection
@section('page_title') {{ trans('label.director') }} @endsection
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
                            <a href="{{route('admin.dashboard')}}">
                                {{ trans('label.home') }}
                            </a>
                            <span class="breadcrumb__seperator">
                                <span class="la la-angle-right"></span>
                            </span>
                        </li>
                        <li class="atbd-breadcrumb__item">
                            <a href="{{route('admin.director.list')}}">
                                Directors List
                            </a>
                            <span class="breadcrumb__seperator">
                                <span class="la la-angle-right"></span>
                            </span>
                        </li>
                        <li class="atbd-breadcrumb__item">
                        @if(isset($blogObjs) && !empty($blogObjs)) Directors Edit @else Directors Add @endif
                        </li>
                    </ul>
                </div>
                <div class="horizontal-form">
                    <!-- Form -->
                        @if(!empty($blogObjs))
							{!! Form::open(array('route' => ('admin.director.update'),'method'=>'POST', 'files'=>true,'class' => 'form-horizontal','id' => 'add_blogs_validation','enctype' => 'multipart/form-data')) !!}
							{!! Form::hidden("id",isset($blogObjs->id) ? $blogObjs->id : '', ['class' => 'form-control','id' => 'hiddenId']) !!}
						@else
							{{ Form::open(array('route' => 'admin.director.store', 'method' => 'POST', 'files'=>true,'class' => 'form-horizontal','id' => 'add_blogs_validation','enctype' => 'multipart/form-data')) }}
							{!! Form::hidden("id",'',['class' => 'form-control','id' => 'hiddenId']) !!}
						@endif
                        <!-- Image Upload -->
                        <div class="form-group row mb-25">
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
                                            if (isset($blogObjs->image) && !empty($blogObjs->image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/Directors') . '/' . $blogObjs->image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" id="old_image"
                                            value="{{ isset($blogObjs->image) && !empty($blogObjs->image)? $blogObjs->image : '' }}">
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

                        <!-- Name -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="name" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Name<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('name', isset($blogObjs->name) ? $blogObjs->name : '', ['placeholder' => 'Enter Name', 'id' => 'name', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                {{-- @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <span class="text-danger" id="errorName"></span> --}}
                                <div id="name_error" class="text-danger"> @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="designation" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Designation<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('designation', isset($blogObjs->designation) ? $blogObjs->designation : '', ['placeholder' => 'Enter Short Description', 'id' => 'designation', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                {{-- @if($errors->has('designation'))
                                    <div class="text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                                <span class="text-danger" id="errorDesignation"></span> --}}
                                <div id="designation_error" class="text-danger"> @error('designation')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description -->

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'description',
                                    isset($blogObjs->description) ? $blogObjs->description : '',
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

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="fb_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Facebook Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('fb_link', isset($blogObjs->fb_link) ? $blogObjs->fb_link : '', ['placeholder' => 'Enter Facebook Link', 'id' => 'fb_link', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="fb_link_error" class="text-danger"> @error('fb_link')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="insta_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Instagram Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('insta_link', isset($blogObjs->insta_link) ? $blogObjs->insta_link : '', ['placeholder' => 'Enter Instagram Link', 'id' => 'insta_link', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="insta_link_error" class="text-danger"> @error('insta_link')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="twitter_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Twitter/X Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('twitter_link', isset($blogObjs->twitter_link) ? $blogObjs->twitter_link : '', ['placeholder' => 'Enter Twitter Link', 'id' => 'twitter_link', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="twitter_link_error" class="text-danger"> @error('twitter_link')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="linkedin_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    LinkedIn Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('linkedin_link', isset($blogObjs->linkedin_link) ? $blogObjs->linkedin_link : '', ['placeholder' => 'Enter Twitter Link', 'id' => 'linkedin_link', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="linkedin_link_error" class="text-danger"> @error('linkedin_link')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="youtube_link" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    YouTube Link<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('youtube_link', isset($blogObjs->youtube_link) ? $blogObjs->youtube_link : '', ['placeholder' => 'Enter Twitter Link', 'id' => 'youtube_link', 'class' => 'form-control add-another-rest', 'data-validation' => 'required']) !!}
                                <div id="youtube_link_error" class="text-danger"> @error('youtube_link')
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
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeBlogStatus(event.target);" {{ (isset($blogObjs->status) && $blogObjs->status == 1) || !isset($blogObjs->status) ? 'checked' : '' }}>
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
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="add_blogs_validation">@if(isset($blogObjs) && !empty($blogObjs)) {{ trans('label.update') }} @else {{ trans('label.save') }} @endif</button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30 " href="{{ route('admin.director.list') }}">{{ trans('label.cancel') }}</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {

        CKEDITOR.replace('description');
        var isEditMode = false;
        @if(isset($blogObjs) && !empty($blogObjs))
            isEditMode = true;
        @endif
        console.log("???", isEditMode);
        $('#add_blogs_validation').validate({
            rules: {
                name: {
                    required: true,
                    // minlength: 2,
                },
                designation: {
                    required: true,
                    // minlength: 5
                },
                image: {
                    // required: true,
                    required: !isEditMode,
                    extension: "png|jpg|jpeg|webp"
                },
                description : {
                    required: function() {
                        var editor = CKEDITOR.instances.description;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                },

                fb_link : {
                    required : true,
                    url : true,
                },

                insta_link : {
                    required : true,
                    url : true,
                },

                twitter_link : {
                    required : true,
                    url : true,
                },
                linkedin_link : {
                    required : true,
                    url : true,
                },
                youtube_link : {
                    required : true,
                    url : true,
                },
            },
            messages: {
                name: {
                    required: "Please enter a name",
                    // minlength: "Name must be at least 2 characters",
                },
                designation: {
                    required: "Please enter a designation",
                    // minlength: "Designation must be at least 5 characters"
                },
                image: {
                    required: "Please select an image",
                    extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
                },
                description: {
                    required: "Please enter a description",
                },
                fb_link : {
                    required: "Please enter facebook link",
                    url : "Please enter valid url",
                },
                insta_link : {
                    required: "Please enter instagram link",
                    url : "Please enter valid url",
                },
                twitter_link : {
                    required: "Please enter twitter/X link",
                    url : "Please enter valid url",
                },
                linkedin_link : {
                    required: "Please enter Linkedin link",
                    url : "Please enter valid url",
                },
                youtube_link : {
                    required: "Please enter YouTube link",
                    url : "Please enter valid url",
                },
            },
            errorPlacement: function(error, element) {
                console.log(element.val());
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
		}
		else {
			$collectedIsVisible = $('#switch_status').attr('value', 0);
		}
	}


</script>
@endsection
