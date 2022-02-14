@section('title', 'Add Customers')
@extends('templates/main')
@section('content')    

@if (session('status'))
    <h6 class="alert col-md-6 alert-success">{{ session('status') }}</h6>
@endif
<div class="card col-md-6">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Add New Customers </h4>
            </div>
            <div class="col-md-2">
                <a href="/customers" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="/customers/add_customers" method="post" enctype="multipart/form-data">
        @csrf
        <div class='mb-3 row'>
            <label for="nama" class='col-sm-4 col-form-label'>Nama</label>
            <div class='col-sm-8'>
                <input type="text" name="nama" class='form-control' id="nama" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="contact" class='col-sm-4 col-form-label'>Contact</label>
            <div class='col-sm-8'>
                <input type="text" name="contact" class='form-control' id="contact"  required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="email" class='col-sm-4 col-form-label'>Email</label>
            <div class='col-sm-8'>
                <input type="email" name="email" class='form-control' id="email" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="alamat" class='col-sm-4 col-form-label'>Alamat</label>
            <div class='col-sm-8'>
                <input type="text" name="alamat" class='form-control' id="alamat" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="tipe_diskon" class='col-sm-4 col-form-label'>Tipe Diskon</label>
            <div class='col-sm-8'>
                <select class="form-select" name="tipe_diskon" id="tipe_diskon" required>
                    <option value="" selected>Chosee Type Diskon.. </option>
                    <option value="persentage">Persentage</option>
                    <option value="fix_diskon">Fix Diskon</option>
                </select>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="diskon" class='col-sm-4 col-form-label'>Diskon</label>
            <div class='col-sm-8'>
                <input type="text" name="diskon" class='form-control' id="diskon" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="formFile" class="form-label col-sm-4">KTP</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" name="ktp" id="formFile" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <input type="submit" value="Add Customers" class="btn btn-primary float-end">
            </div>
        </div>
    </form>
</div>
</div>





@endsection
