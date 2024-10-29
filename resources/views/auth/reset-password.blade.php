@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center">
                <h3>Reset Password</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}" id="reset-password-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" placeholder="Enter your email" required></input>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your new password" required></input>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your new password" required></input>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-primary" id="reset-password-btn">
                        Reset Password
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="reset-password-spinner"></span>
                    </button>
                </div>

                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
@endsection
