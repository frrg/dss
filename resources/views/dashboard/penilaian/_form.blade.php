@forelse($kriterium as $kriteria)
<div class="form-group">
	@php
	$bobot = [];
	@endphp
	@forelse($kriteria->bobotkriteria as $bobotKriteria)
	@php
	$bobot[$bobotKriteria->bobot] = $bobotKriteria->bobot;
	@endphp
	@empty
	@php
	$bobot = [];
	@endphp
	@endforelse
	{!! Form::label($kriteria->kriteria_kode,$kriteria->kriteria_keterangan) !!}
	{!! Form::select($kriteria->kriteria_kode,$bobot,null,[
	'class' => 'form-control',
	'placeholder' => '-- PILIH --'
	]) !!}

	@error($kriteria->kriteria_kode)
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>
@empty

@endforelse