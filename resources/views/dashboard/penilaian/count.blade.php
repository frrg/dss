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
						<h4>Hasil Perhitungan</h4>
					</div>
					<div class="card-body">
						<h3>Normalisasi</h3>
						@php $n=0 @endphp
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<th>Pelamar</th>
									@forelse($kriterium as $key => $val)
									<th>
										{{ $val->kriteria_keterangan }} {{ $val->kriteria_kode }} [ {{ $val->kriteria_bobot }} ]
									</th>
									@empty

									@endforelse
								</thead>
								@forelse($pelamars as $pelamar)
								<tr>
									<td>
										{{ $pelamar->pelamar_nama }}
									</td>
									@foreach($normalisasi[$pelamar->pelamar_nama] as $key => $val)
									<td>
										{{ $val }}
									</td>
									@endforeach
								</tr>
								@empty

								@endforelse
							</table>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h3>Ranking</h3>
						<div class="table-resposive">
							<table class="table table-striped table-bordered">
								<thead>
									<th>Pelamar</th>
									<th>Total</th>
									<th>Ranking</th>
								</thead>
								<tbody>
									@php $rank = 1 @endphp
									@foreach($ranking as $r)
									<tr>
										<td>
											{{ $r['nama'] }}
										</td>
										<td>
											{{ $r['total'] }}
										</td>
										<td>
											{{ $rank++ }}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection