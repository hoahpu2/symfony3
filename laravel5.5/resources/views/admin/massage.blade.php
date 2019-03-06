@if(Session::has('flash_message'))
<div class="row">
<div class="alert alert-{!! Session::get('flash_lever') !!}">
		{!! Session::get('flash_message') !!}
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	</div>
</div>
@endif