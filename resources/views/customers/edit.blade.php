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
                <h4> Edit Customers </h4>
            </div>
            <div class="col-md-2">
                <a href="/customers" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="{{ url('customers/update_customers/'.$customers->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class='mb-3 row'>
            <label for="nama" class='col-sm-4 col-form-label'>Nama</label>
            <div class='col-sm-8'>
                <input type="text" name="nama" value="{{$customers->nama}}" class='form-control' id="nama" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="contact" class='col-sm-4 col-form-label'>Contact</label>
            <div class='col-sm-8'>
                <input type="text" name="contact" value="{{$customers->contact}}" class='form-control' id="contact" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="email" class='col-sm-4 col-form-label'>Email</label>
            <div class='col-sm-8'>
                <input type="email" name="email" value="{{$customers->email}}" class='form-control' id="email" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="alamat" class='col-sm-4 col-form-label'>Alamat</label>
            <div class='col-sm-8'>
                <input type="text" name="alamat" value="{{$customers->alamat}}"  class='form-control' id="alamat" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="tipe_diskon" class='col-sm-4 col-form-label'>Tipe Diskon</label>
            <div class='col-sm-8'>
                <select class="form-select" name="tipe_diskon" id="tipe_diskon" required>
                    <option value="persentage" {{ ($customers->tipe_diskon === 'persentage'  ) ? 'selected' : '' }} >Persentage</option>
                    <option value="fix_diskon" {{ ($customers->tipe_diskon === 'fix_diskon'  ) ? 'selected' : '' }}>Fix Diskon</option>
                </select>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="diskon" class='col-sm-4 col-form-label'>Diskon</label>
            <div class='col-sm-8'>
                <input type="text" name="diskon" value="{{$customers->diskon}}"  class='form-control' id="diskon" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="formFile" class="form-label col-sm-4">KTP</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" name="ktp" id="formFile" required>
            </div>
        </div>
        <div class="row mb-3">
            <img class="img-thumbnail card-img" style="max-width: 230px" src="{{ asset('uploads/customers/'.$customers->ktp) }}"  alt="Image">
        </div>
        <div class='mb-3 row'>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <input type="submit" value="Edit Customers" class="btn btn-primary float-end">
            </div>
        </div>
    </form>
</div>
</div>

@endsection
