<div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="modalConfirmLabel" \ aria-modal="true" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<form>
				@method('delete')
				@csrf
				<input type="hidden" name="delete-id" value="">
				<div class="modal-header">
					<h4 class="modal-title">Hapus data</h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin untuk menghapus?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
					<button id="delete-btn" class="btn btn-danger" data-dismiss="modal">Hapus</button>
				</div>
			</form>
		</div>

	</div>

</div>