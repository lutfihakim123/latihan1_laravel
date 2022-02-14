@section('title', 'Add Items')
@extends('templates/main')
@section('content')    

@if (session('status'))
    <h6 class="alert col-md-6 alert-success">{{ session('status') }}</h6>
@endif
<div class="card col-md-6">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Add New Items </h4>
            </div>
            <div class="col-md-2">
                <a href="/items" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="/items/add_items" method="post" enctype="multipart/form-data">
        @csrf
        <div class='mb-3 row'>
            <label for="item_name" class='col-sm-4 col-form-label'>Item Name</label>
            <div class='col-sm-8'>
                <input type="text" name="item_name" class='form-control' id="item_name">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="unit" class='col-sm-4 col-form-label'>Unit (Kg)</label>
            <div class='col-sm-8'>
                <input type="text" name="unit" class='form-control' id="unit">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="stock" class='col-sm-4 col-form-label'>Stock</label>
            <div class='col-sm-8'>
                <input type="text" name="stock" class='form-control' id="stock">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="price" class='col-sm-4 col-form-label'>Price</label>
            <div class='col-sm-8'>
                <input type="text" name="price" class='form-control' id="price">
            </div>
        </div>
        <div class="row mb-3">
            <label for="formFile" class="form-label col-sm-4">Image</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
        </div>
        <div class='mb-3 row'>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <input type="submit" value="Add Items" class="btn btn-primary float-end">
            </div>
        </div>
    </form>
</div>
</div>

@endsection
