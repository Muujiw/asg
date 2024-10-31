@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-white" style="background-color: #21618C;">
                    {{ __('Réinitialiser le mot de passe') }}
                </div>

                <div class="card-body" style="background-color: #EBF5FB;">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                                   style="border-color: #3498DB;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password" style="border-color: #3498DB;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirmez le mot de passe') }}</label>
                            <input type="password" id="password_confirmation" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   style="border-color: #3498DB;">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0 text-end">
                            <button type="submit" class="btn text-white" style="background-color: #3498DB;">
                                {{ __('Réinitialiser le mot de passe') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
