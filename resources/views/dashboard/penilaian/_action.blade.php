@if(!$hasNilai)
<a href="{{ route('pelamar-penilaian.create',['pelamar_penilaian' => $id]) }}" class="btn btn-info">
	<svg class="c-icon">
		<use xlink:href="{{ asset('icons/svg/free.svg#cil-plus') }}"></use>
	</svg>
	Nilai
</a>
@endif
<button class="btn btn-danger delete" id="delete" data-id="{{ $id }}">
	<svg class="c-icon">
		<use xlink:href="{{ asset('icons/svg/free.svg#cil-trash') }}"></use>
	</svg>
</button>
