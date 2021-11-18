@extends('layouts.master')
@section('title') {{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Selamat datang {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection