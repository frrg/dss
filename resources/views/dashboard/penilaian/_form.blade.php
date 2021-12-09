@forelse($kriterium as $kriteria)
<div class="form-group">
	@php
	$bobot = [];
	@endphp
	@forelse($kriteria->bobotkriteria as $bobotKriteria)
	@php
	$bobot[$bobotKriteria->id] = $bobotKriteria->keterangan;
	@endphp
	@empty
	@php
	$bobot = [];
	@endphp
	@endforelse
	{!! Form::label($kriteria->kriteria_kode . '_' . $kriteria->id,$kriteria->kriteria_keterangan) !!}
	{!! Form::select($kriteria->kriteria_kode . '_' . $kriteria->id,$bobot,null,[
	'class' => 'form-control',
	'placeholder' => '-- PILIH --'
	]) !!}

	@error($kriteria->kriteria_kode . '_' . $kriteria->id)
	<small class="text-danger error-msg">
		{{ $message }}
	</small>
	@enderror
</div>
@empty

@endforelse