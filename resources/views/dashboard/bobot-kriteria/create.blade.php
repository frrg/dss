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
						<h4>Tambah Data Bobot</h4>
					</div>
					<div class="card-body">
						<div class="row d-flex justify-content-center">
							<div class="col-sm-8">
								{!! Form::open(['route' => ['kriteria.bobot-kriteria.store','kriterium' => request()->kriterium],'method' => 'POST']) !!}
								@include('dashboard.bobot-kriteria._form')

								<div class="text-right">
									<a class="btn btn-outline-primary mx-2" href="{{ route('kriteria.bobot-kriteria.index',['kriterium' => request()->kriterium]) }}">Kembali</a>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.partials.modal-confirm')

@endsection