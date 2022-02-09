@extends('templates/auth')
@section('content')
<form action="/register"  method="post">
    
            
           
    <h3 class="mb-5">{{ $title }}</h3>
  
    @csrf
    <div class='mb-3 row'>
        <label for="name" class='col-sm-3 col-form-label'>Full Name</label>
        <div class='col-sm-9'>
            <input type="text" name="name" value="{{ old('name') }}" class='form-control @error('name') is-invalid @enderror ' id="name">
            @error('name')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class='mb-3 row'>
        <label for="username" class='col-sm-3 col-form-label'>Username</label>
        <div class='col-sm-9'>
            <input type="text" name="username" value="{{ old('username') }}" class='form-control @error('username') is-invalid @enderror' id="username">
            @error('username')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class='mb-3 row'>
        <label for="email" class='col-sm-3 col-form-label'>Email</label>
        <div class='col-sm-9'>
            <input type="email" name="email" value="{{ old('email') }}" class='form-control @error('email') is-invalid @enderror' id="email">
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
    <button class="btn col-md-12 btn-primary btn-lg btn-block" type="submit">Register</button>
</form>
            
@endsection