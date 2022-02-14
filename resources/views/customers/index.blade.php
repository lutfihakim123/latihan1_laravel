@section('title', 'List Customers')
@extends('templates/main')
@section('content')    
@if (session('status'))
    <h6 class="alert alert-success">{{  session('status') }}</h6>
@endif
<div class="card " style="background-color: whitesmoke;" >
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Data Customers  </h4>
            </div>
            <div class="col-md-2">
                <a href="customers/add_customers" class="btn btn-primary float-end">Add Customers</a>
            </div>
        </div>
       <div class="card-body">
        
                <div class="row mb-3">
                <?php    
                ?>
                @foreach ($customers as $customer)
                <div class="card me-2 col-md-3 mb-3 bg-light">
                    <div class="card-header">
                        {{ $customer->nama }}
                    </div>

                    <div class="card-body">
                        <img src="{{ asset('uploads/customers/'.$customer->ktp) }}" class="img img-fluid justify-content-center" style="max-width: 200px;" alt="Image"> 
                        <p class="mt-2">Contact  : {{ $customer->contact }}</p>
                        <p>email  : {{ $customer->email }}</p>
                        <p>Alamat  : {{ $customer->alamat }}</p>
                        <p>Tipe_diskon  : {{ $customer->tipe_diskon }}</p>
                        <p>Diskon  : {{ $customer->diskon }}</p>
                        <form action="{{ url('customers/delete_customers/'.$customer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            <a href="{{ url('customers/edit_customers/'.$customer->id)  }}" class="btn btn-primary btn-sm ">Edit</a>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
       </div>
    </div>
</div>

@endsection
