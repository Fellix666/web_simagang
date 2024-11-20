@extends('layouts.app')@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login Admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">@csrf<div class="form-group mb-3">
                            <label>Username</label><input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required>
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3"><label>Password</label><input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div><button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
