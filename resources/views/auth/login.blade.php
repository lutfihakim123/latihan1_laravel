@extends('templates/auth')
@section('content')
<form action="/login"  method="post">
    <h3 class="mb-5">{{ $title }}</h3>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> Please Login !!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('LoginError') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @csrf
    <div class='mb-3 row'>
        <label for="email" class='col-sm-3 col-form-label'>Email</label>
        <div class='col-sm-9'>
            <input type="email" name="email" value="{{ old('email') }}" class='form-control @error('email') is-invalid @enderror' id="email" autofocus required>
            @error('email')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class='mb-3 row'>
        <label for="password" class='col-sm-3 col-form-label'>Password</label>
        <div class='col-sm-9'>
            <input type="password" name="password"  class='form-control @error('password') is-invalid @enderror' id="password">
            @error('password')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- <hr class="my-4"> --}}
    <button class="btn col-md-12 btn-primary btn-lg btn-block" type="submit">Login</button>
</form>
            
@endsection