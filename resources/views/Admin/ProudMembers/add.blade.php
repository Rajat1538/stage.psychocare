@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.proudMembers') }} @endsection
@section('page_title') {{ trans('label.proudMembers') }} @endsection
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
                            <a href="{{route('admin.proud_member.list')}}">
                                Proud Member List
                            </a>
                            <span class="breadcrumb__seperator">
                                <span class="la la-angle-right"></span>
                            </span>
                        </li>
                        <li class="atbd-breadcrumb__item">
                        @if(isset($companyProfile) && !empty($companyProfile)) Proud member Edit @else Proud member Add @endif
                        </li>
                    </ul>
                </div>
                <div class="horizontal-form">
                    <!-- Form -->
                        @if(isset($companyProfile))
							{!! Form::open(array('route' => ('admin.proud_member.update'),'method'=>'POST', 'files'=>true,'class' => 'form-horizontal','id' => 'form','enctype' => 'multipart/form-data')) !!}
							{!! Form::hidden("id",isset($companyProfile->id) ? $companyProfile->id : '', ['class' => 'form-control','id' => 'hiddenId']) !!}
						@else
							{{ Form::open(array('route' => 'admin.proud_member.store', 'method' => 'POST', 'files'=>true,'class' => 'form-horizontal','id' => 'form','enctype' => 'multipart/form-data')) }}
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
                                            if (isset($companyProfile->image) && !empty($companyProfile->image)) {
                                                $mainImageUrl = asset('storage/app/public/uploads/ProudMembers') . '/' . $companyProfile->image;
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" id="old_image"
                                                value="{{ isset($companyProfile->image) && !empty($companyProfile->image) ? $companyProfile->image : '' }}">
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

                        <!-- Status -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Status</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeBlogStatus(event.target);" {{ (isset($companyProfile->status) && $companyProfile->status == 1) || !isset($companyProfile->status) ? 'checked' : '' }}>
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
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($companyProfile) && $companyProfile->count() > 0)
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.client_review.list') }}">{{ trans('label.cancel') }}</a>
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



        var isImageUploded = $('#old_image').val() ? true : false;
        $('#form').validate({
            ignore: [],
            rules: {

                'image': {
                    required: !isImageUploded,
                    extension: "png|jpg|jpeg|webp"
                },
            },
            messages: {

                'image': {
                    required: "Please select an image",
                    extension: "Please upload only image files of type: PNG, JPG, JPEG, WEBP"
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
