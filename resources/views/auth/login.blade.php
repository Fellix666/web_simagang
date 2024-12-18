@extends('layouts.loginApp')
@section('content')
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <h3 class="mb-0">
                        <i class="fas fa-user-lock me-2"></i>Admin Login
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login.submit') }}" novalidate>
                        @csrf
                        <div class="mb-4">
                            <label for="username" class="form-label fw-bold">
                                <i class="fas fa-user me-2"></i>Username
                            </label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                    value="{{ old('username') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="Enter your username"
                                >
                                @error('username')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <button
                                type="submit"
                                class="btn btn-primary flex-grow-1 me-md-2 d-flex align-items-center justify-content-center"
                            >
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                            <a
                                href="{{ route('home') }}"
                                class="btn btn-outline-secondary flex-grow-1 d-flex align-items-center justify-content-center"
                            >
                                <i class="fas fa-arrow-left me-2"></i>Back to Home
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
    /* Existing styles remain the same */
    .bg-gradient-primary {
        background: linear-gradient(to right, #4e73df 0%, #224abe 100%);
    }

    /* Subtle hover effects */
    .btn-primary, .btn-outline-secondary {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover, .btn-outline-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .btn-primary::before, .btn-outline-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255,255,255,0.2);
        transition: all 0.3s ease;
    }

    .btn-primary:hover::before, .btn-outline-secondary:hover::before {
        left: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .btn-primary, .btn-outline-secondary {
            display: flex;
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
