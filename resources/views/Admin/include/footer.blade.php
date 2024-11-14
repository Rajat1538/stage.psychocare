<footer class="footer-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-copyright">
					<p>{{ trans('label.powered_by') }} {{ Cache::get('site_name') }} © <?= date('Y') ?> {{ trans('label.all_rights_reserved') }}</p>
				</div>
			</div>
			{{--<div class="col-md-6">
				<div class="footer-menu text-right">
					<ul>
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Team</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>
				</div>
				<!-- ends: .Footer Menu -->
			</div>--}}
		</div>
	</div>
</footer>

<div class="overlay-dark"></div>