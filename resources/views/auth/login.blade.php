@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login Admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required>
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .btn-outline-secondary {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        transform: translateX(-5px);
    }

    .btn-outline-secondary i {
        transition: transform 0.3s ease;
    }

    .btn-outline-secondary:hover i {
        transform: translateX(-3px);
    }
</style>
