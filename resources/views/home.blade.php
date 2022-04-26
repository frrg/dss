@extends('layouts.master')
@section('title') {{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card bg-info text-white">

                <div class="card-body">
                Jumlah Pelamar <h3>{{ $jmlPelamar }}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    Jumlah Kriteria <h3>{{ $jmlKriteria }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection