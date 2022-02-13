@extends('templates/main')
@section('content')    
@auth
    <h4> Welcome To User Management System </h4>
@else 
    <h4> Welcome To User Management System Please Login First </h4>
@endauth
@endsection
