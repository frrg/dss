<div class="form-group">
	{!! Form::label('kriteria_kode','Kode Kriteria') !!}
	{!! Form::text('kriteria_kode',null,[
	'class' => 'form-control',
	'placeholder' => 'Kode Kriteria',
	'autocomplete' => 'off'
	]) !!}

	@error('kriteria_kode')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('kriteria_keterangan','Keterangan Kriteria') !!}
	{!! Form::text('kriteria_keterangan',null,[
	'class' => 'form-control',
	'placeholder' => 'Keterangan Kriteria',
	'autocomplete' => 'off'
	]) !!}

	@error('kriteria_keterangan')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('kriteria_jenis','Kode Kriteria') !!}
	{!! Form::select('kriteria_jenis',[
	'BENEFIT' => 'BENEFIT',
	'COST' => 'COST'
	],null,[
	'class' => 'form-control',
	'placeholder' => '-- PILIH --'
	]) !!}

	@error('kriteria_jenis')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>