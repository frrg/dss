@extends('layouts.master')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="container">
	<div class="fade-in">
		@include('layouts.partials.alert')
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Kriteria</h4>
					</div>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-sm-12 text-right">
								<a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Data</a>
							</div>
						</div>
						@include('dashboard.kriteria._table')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.partials.modal-confirm')
@endsection
@push('scripts')
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script type="text/javascript">
	"use strict"
	$(document).ready(function() {
		let oTable = LaravelDataTables['kriteria-table'];
		let token = $('meta[name="csrf_token"]').attr('content');

		function deleteData(dom) {
			let url = "<?= route('kriteria.destroy', ':id') ?>";
			let id = dom.data('id');
			url = url.replace(':id', id);
			axios.post(url, {
				'_method': 'DELETE',
				'_token': token
			}).then(function(response) {
				if (response.data.code == '200') {
					Swal.fire(
						'Terhapus!',
						'Data telah terhapus.',
						'success'
					)
					oTable.ajax.reload();
				} else {
					Swal.fire(
						'Gagal Terhapus!',
						'Data gagal terhapus.',
						'error'
					)
				}
			}).catch(function(error) {
				if (error.response.data.code == '419') {
					Swal.fire(
						'Gagal Terhapus!',
						'Kode Salah',
						'error'
					)
				}
			});
		}

		function alertDelete(dom) {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Data akan dihapus secara permanen!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus'
			}).then((result) => {
				if (result.isConfirmed) {
					deleteData(dom)
				}
			})
		}
		$('table#kriteria-table tbody').on('click', 'tr td button.delete', function() {
			alertDelete($(this));
		})

	});
</script>
@endpush