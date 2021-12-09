<div class="form-group">
	{!! Form::label('penilaian_nama','Nama Penilaian') !!}
	{!! Form::text('penilaian_nama',null,[
	'class' => 'form-control',
	'placeholder' => 'Nama Penilaian',
	'autocomplete' => 'off'
	]) !!}

	@error('penilaian_nama')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>