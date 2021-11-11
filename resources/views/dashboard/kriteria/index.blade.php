@extends('layouts.master')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="container">
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Kriteria</h4>
					</div>
					<div class="card-body">
						@include('dashboard.kriteria._table')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
@endpush