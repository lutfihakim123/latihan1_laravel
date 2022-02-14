@section('title', 'Home Page')
@extends('templates/main')
@section('content')    
@auth
    <h4> Welcome To Inventory Seller System </h4>
@else 
    <h4> Welcome To Inventory Seller System <b style="color: red;"> Please Login First </b>  </h4>
@endauth
@endsection
