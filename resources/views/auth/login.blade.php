@extends('layouts.auth.main')
{{-- Layout tampilan blade templating untuk login page --}}
@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title">Login.</h1>
            <p class="auth-subtitle mb-5">Masuk untuk melanjutkan.</p>
            @if (session('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/login" method="POST">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('email')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" value="" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
        
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div class="d-flex justify-content-center align-items-center" id="auth-right">
            <img class="w-50" src="{{ asset('img/cewek.png') }}" alt="cewek">
        </div>
    </div>
</div>
@endsection