<div class="form-group">
	{!! Form::label('pelamar_nama','Nama Pelamar') !!}
	{!! Form::text('pelamar_nama',null,[
	'class' => 'form-control',
	'placeholder' => 'Nama Pelamar',
	'autocomplete' => 'off'
	]) !!}

	@error('pelamar_nama')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('pelamar_alamat','Alamat') !!}
	{!! Form::text('pelamar_alamat',null,[
	'class' => 'form-control',
	'placeholder' => 'Alamat',
	'autocomplete' => 'off'
	]) !!}

	@error('pelamar_alamat')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('pelamar_jekel','Jenis Kelamin') !!}
	{!! Form::select('pelamar_jekel',[
	'LAKI-LAKI' => 'LAKI-LAKI',
	'PEREMPUAN' => 'PEREMPUAN'
	],null,[
	'class' => 'form-control',
	'placeholder' => '-- PILIH --'
	]) !!}

	@error('pelamar_jekel')
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>