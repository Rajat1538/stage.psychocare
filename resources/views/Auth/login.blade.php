@extends('layouts.layout')
@section('title') {{ trans('label.login') }} @endsection
@section('styles')
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
										<div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
											<div class="edit-profile__title">
												<h6>{{ trans('label.sign_in') }} to <span class="color-primary">Admin</span></h6>
											</div>
										</div>
										<form method="POST" action="{{ url('admin/loginValidate') }}" name="login" id="loginForm" class="login-form">
											@csrf
											<div class="card-body">
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
												<div class="edit-profile__body">
													<div class="form-group mb-20">
														<label for="email">{{ trans('label.email') }}</label>
														<input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="loginemail" maxlength="50" placeholder="{{ trans('label.email') }}" onkeyup="return emailValidate()" value="{{ old('email') }}" required>
														@if ($errors->has('email'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('email') }}</strong>
															</span>
														@endif
														<span class="text-danger" id="errorEmail"></span>
													</div>
													<div class="form-group mb-15">
														<label for="password">{{ trans('label.password') }}</label>
														<div class="position-relative">
															<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" maxlength="20" placeholder="{{ trans('label.password') }}" onkeyup="return passwordValidate()" required>
															<div id="togglePassword" class="fa fa-fw text-light fs-16 field-icon toggle-password2 fa-eye-slash"></div>
														</div>
														@if ($errors->has('password'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('password') }}</strong>
															</span>
														@endif
														<span class="text-danger" id="errorPassword"></span>
													</div>
													<div class="signUp-condition signIn-condition">
														<div class="checkbox-theme-default custom-checkbox ">
															<button id="signin" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn" type="submit">
																{{ trans('label.sign_in') }}
															</button>
														</div>
														<a href="{{ url('admin/forgot-password') }}" class="text-primary">{{ trans('label.forgot_password') }}</a>
													</div>
													@include('Auth.include.copyright')
												</div>
											</div>
										</form>
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
		'password_allow' => trans('validation.password_allow')
    ]); ?>;
</script>
@endsection
@section('scripts')
<script type="text/javascript">
	setInterval(function() {
		setTimeout(function() {
			$('.alert-dismissable').hide()
		}, 5000);
	},3000);
	$( document ).ready(function() {
		$('#loginemail').keypress(function (e) {
			const num_reg=/^\S*$/
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if(e.charCode == 13){
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
