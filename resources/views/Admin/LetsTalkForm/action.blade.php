@if(!empty($btn))
<div class="dots-header">
	<div class="dropdown">
		<ul class="dropbtn icons btn-right showLeft" onclick="showDropdown({{$btn['id']}})">
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<div id="myDropdown{{$btn['id']}}" class="dropdown-content">
			<ul class="orderDatatable_actions mb-0 d-flex flex-wrap">

				<li>
				@if(isset($btn['delete']))
					<a href="{{ route('admin.letstalk-form.remove', $btn['delete']) }}" class="remove" onclick="if (confirm(' {{ trans('admin_messages.delete_menu') }} ')) {
						return true; } else { return false; }">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
					</a>
				@endif
				</li>
                <li>

			</ul>
		</div>
	</div>
</div>
@endif
