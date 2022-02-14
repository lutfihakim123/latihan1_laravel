@section('title', 'List Items')
@extends('templates/main')
@section('content')    
@if (session('status'))
    <h6 class="alert alert-success">{{  session('status') }}</h6>
@endif
<div class="card " style="background-color: white;" >
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Data Items  </h4>
            </div>
            <div class="col-md-2">
                <a href="items/add_items" class="btn btn-primary float-end">Add Items</a>
            </div>
        </div>
       <div class="card-body">
        
                <div class="row mb-3">
                <?php    
                ?>
                @foreach ($items as $item)
                <div class="card me-2 col-md-3 mb-3 bg-light">
                    <div class="card-header">
                        {{ $item->item_name }}
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('uploads/items/'.$item->image) }}" class="img img-fluid justify-content-center" style="max-width: 200px;" alt="Image">
                        <p>Unit  : {{ $item->unit }}</p>
                        <p>stock  : {{ $item->stock }}</p>
                        <p>price  : {{ $item->price }}</p>
                        <form action="{{ url('items/delete_items/'.$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            <a href="{{ url('items/edit_items/'.$item->id)  }}" class="btn btn-success btn-sm ">Edit</a>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
       </div>
    </div>
</div>

@endsection
