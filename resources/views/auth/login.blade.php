@extends('layouts.master-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body row d-flex align-items-center">
                        <div class="col-sm-12">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h1 class="mb-4">Login</h1>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ asset('icons/svg/free.svg#cil-user') }}"></use>
                                            </svg></span></div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ asset('icons/svg/free.svg#cil-lock-locked') }}"></use>
                                            </svg></span></div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat sesi login') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-info py-5 d-md-down-none" style="width:44%">

                    <div class="card-body row d-flex text-center align-items-center">
                        <div class="col-sm-12">
                            <!-- logo company -->
                            <h3>DSS</h3>
                            <!-- <img src="{{ asset('img/profile.jpg') }}" class="img-fluid" alt="Logo"> -->
                            <p>By Feri &copy; {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection