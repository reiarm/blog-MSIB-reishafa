@extends('layouts.app')

@section('title', 'Email Password Reset Link')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center">
                <h3>Email Password Reset Link</h3>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="row g-3" id="send-email-reset-form">
                    @csrf
                    <div class="col-md-8">
                        <label for="email" class="visually-hidden">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" id="send-email-reset-btn" class="btn btn-primary">
                            Send Password Reset Link
                            <span class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true" id="spinner"></span>
                        </button>
                    </div>

                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.getElementById('send-email-reset-form').addEventListener('submit', function(e) {
            var button = document.getElementById('send-email-reset-btn');
            var spinner = document.getElementById('spinner');

            button.disabled = true;
            spinner.classList.remove('d-none');

            e.target.submit();
        });
    </script>
@endsection
