@extends('layouts.layout')
@section('title') {{ trans('label.resent_password') }} @endsection
@section('styles')
<style type="text/css">
	.error{
			color:red;
	}
</style>
@endsection
@section('content')
<main class="main-content">
	<div class="signUP-admin">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
					<div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">
						<div class="signUp-topbar d-flex align-items-center justify-content-md-end justify-content-center mt-md-0 mb-md-0 mt-20 mb-1">
							<p class="mb-0">
							</p>
						</div><!-- End: .signUp-topbar  -->
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-8 col-md-12">
								<div class="edit-profile mt-md-25 mt-0">
									<div class="card border-0">
										@if ($message = Session::get('success'))
										<div class="alert alert-success alert-dismissable" style="padding: 10px;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
											<p>{{ $message }}</p>
										</div>
										@endif
										@if ($message = Session::get('error'))
										<div class="alert alert-danger alert-dismissable" style="padding: 10px;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
											<p>{{ $message }}</p>
										</div>
										@endif
										<div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
											<div class="edit-profile__title">
												<h6>Reset Password<span class="color-primary"></span></h6>
											</div>
										</div>
										{{ Form::open(array('url' => 'admin/reset-password-save' ,'name' => 'register', 'id' => 'adminResetPassword')) }}
										<input type="hidden" name="id" value="{{ $users->id }}">
										<div class="card-body">
											
											<div class="edit-profile__body">
												<div class="form-group mb-20">
													 {!! Form::label(trans('label.new_password'), trans('label.new_password'),array('class'=>'control-label visible-ie8 visible-ie9')) !!}
													 <div class="position-relative">
													{{ Form::password("password", array('required' => 'required','class' => 'form-control placeholder-no-fix','maxlength' => '20', 'placeholder' => trans('label.new_password'),'onkeyup' => 'return passwordValidate()','id'=>'password')) }}
													<div id="togglePassword" class="fa fa-fw text-light fs-16 field-icon toggle-password2 fa-eye-slash"></div>
													</div>
													<span class="text-danger text_danger_size" id="errorPassword">{{ trans('label.password_note') }}</span>
													<span id="error" class="error">{{ $errors->first('password') }}</span>
													<span class="text-danger text_danger_size" id="errorPassword"></span>
												</div>
												<div class="form-group mb-20">
												{!! Form::label(trans('label.Re_type_password'), trans('label.Re_type_password'),array('class'=>'control-label visible-ie8 visible-ie9')) !!}
												<div class="position-relative">
													{{ Form::password("c_password", array('required' => 'required','class' => 'form-control placeholder-no-fix','maxlength' => '20', 'placeholder' => trans('label.Re_type_password'),'onkeyup' => 'return ConfirmpasswordValidate()','id'=>'c_password')) }}
													<div id="confirmtogglePassword" class="fa fa-fw text-light fs-16 field-icon toggle-password2 fa-eye-slash"></div>
												</div>
													<span id="error" class="error">{{ $errors->first('c_password') }}</span>
													<span class="text-danger text_danger_size" id="c_errorPassword"></span>
												</div>
												<div class="signUp-condition signIn-condition">
													<div class="checkbox-theme-default custom-checkbox">
														<button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn pull-right" type="submit">
														Change Password
														</button>
													</div>
												</div>
												@include('Auth.include.copyright')
											</div>
										</div>
										{{ Form::close() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	var translations = <?php echo json_encode([
		'password_required' => trans('validation.password_required'),
		'password_min_length' => trans('validation.password_min_length'),
		'password_max_length' => trans('validation.password_max_length'),
		'password_allow' => trans('validation.password_allow'),
		'comfirm_password_required' => trans('validation.comfirm_password_required'),
		'comfirm_password_min_length' => trans('validation.comfirm_password_min_length'),
		'comfirm_password_max_length' => trans('validation.comfirm_password_max_length'),
		'comfirm_password_dont_match' => trans('validation.comfirm_password_dont_match'),
	]); ?>;
</script>
@endsection
@section('scripts')
<script type="text/javascript"> 
	 setInterval(function() {
		setTimeout(function() {
			$('.error').hide()
		}, 5000);
	},3000);
	</script>
@endsection