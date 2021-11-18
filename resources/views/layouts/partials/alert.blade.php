@if(session()->has('message'))
<div class="row" id="alert">
	<div class="col-sm-12">
		<div class="alert alert-primary" role="alert">{{ session('message') }}</div>
	</div>
</div>
@push('scripts')
<script>
	function hideAlert() {

		return false;
	}
	setTimeout(function() {
			document.getElementById('alert').style.display = 'none';
		},
		3000);
</script>
@endpush
@endif