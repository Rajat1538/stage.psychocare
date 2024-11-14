@extends('layouts.layout')
@section('title') {{ trans('label.forgot_password') }} @endsection
@section('styles')
<style>
.error{
	color:red;
}
#back{
	background-color: #4d4d4d;
	color:#ffff;
	font-weight: 500;
}
</style>
@endsection 
@section('content')

<!-- BEGIN FORGOT PASSWORD FORM -->
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
										<div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
											<div class="edit-profile__title">
												<h6>{{ trans('label.forgot_password') }} <span id= title class="color-primary"></span></h6>
											</div>
										</div>
										{{ Form::open(array('url' => route('admin.forgotPasswordMail') ,'name' => 'forgotPassword','class' => 'login-form','id' => 'forgetFormAdmin')) }}

										<div class="card-body">
											@if ($message = Session::get('success'))
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
												<p>{{ $message }}</p>
											</div>
											@endif
											@if ($message = Session::get('error'))
											<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
												<p>{{ $message }}</p>
											</div>
											@endif
											
											<div class="edit-profile__body">
												<div class="form-group mb-20">
													{!! Form::label(trans('label.email'), trans('label.email'),array('for'=>'Email')) !!}
													
													{{ Form::text("forgot_email_id", '',array('required' => 'required','class' => 'form-control placeholder-no-fix','maxlength' => '50','onkeyup' => 'return emailPhoneValidate()', 'id' => 'forgot_email_id','placeholder'=>trans('label.enter_email'))) }}
													<span class="error">{{ $errors->first('forgot_email_id') }}</span>
													<span class="text-danger" id="errorEmailPhone"></span>
												</div>
												
												<div class="signUp-condition signIn-condition">
													<a href="{{ url('admin/login') }}" id="back" class="btn btn-blue-grey  btn-squared text-capitalize lh-normal px-50 py-15 signIn-createBtn">{{ trans('label.back') }}</a> 
													<div class="checkbox-theme-default custom-checkbox ">     
														<button class="btn btn-primary btn-default btn-squared mr-0 text-capitalize lh-normal px-50 py-15 signIn-createBtn" type="submit">
														Submit
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
        'email_required' => trans('validation.email_required'),
        'email_valid' => trans('validation.email_valid'),
		'password_required' => trans('validation.password_required'),
		'password_min_length' => trans('validation.password_min_length'),
		'password_max_length' => trans('validation.password_max_length'),
		'password_allow' => trans('validation.password_allow'),
		'email_invalid' => trans('validation.email_invalid')
    ]); ?>;
</script>
@endsection
@section('scripts')
<script>
$( document ).ready(function() {
	$('#forgot_email_id').keypress(function (e) {
		const num_reg=/^\S*$/ 
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (e.charCode == 13) {
			return true;
		}
		if (num_reg.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
});
</script>
@endsection