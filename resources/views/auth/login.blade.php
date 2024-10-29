@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error with your credentials. Try Again.</strong>
            </div>
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="card-title">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    Don't have an account? <a href="{{ route('register') }}">Register</a>
                </div>
                <div class="card-footer text-muted text-center">
                    Forgot your password? <a href="{{ route('password.request') }}">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
