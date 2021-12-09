

<div class="form-group">
	{!! Form::label('keterangan','Keterangan Bobot') !!}
	{!! Form::text('keterangan',null,[
	'class' => 'form-control',
	'placeholder' => 'Keterangan Bobot',
	'autocomplete' => 'off'
	]) !!}

	@error('keterangan')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>
<div class="form-group">
	{!! Form::label('bobot','Bobot Kriteria') !!}
	{!! Form::text('bobot',null,[
	'class' => 'form-control',
	'placeholder' => 'Kode Kriteria',
	'autocomplete' => 'off'
	]) !!}

	@error('bobot')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>