<div class="table-responsive">
	{!! $datatable->html()->table() !!}
</div>

@push('scripts')
	{!! $datatable->html()->scripts() !!}
@endpush