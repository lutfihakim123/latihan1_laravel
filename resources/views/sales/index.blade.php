@section('title', 'List sales')
@extends('templates/main')
@section('content')    
@if (session('status'))
    <h6 class="alert alert-success">{{  session('status') }}</h6>
@endif
<div class="card " style="background-color: white;" >
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Data sales  </h4>
            </div>
            <div class="col-md-2">
                <a href="sales/add_sales" class="btn btn-primary float-end">Add sales</a>
            </div>
        </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered">
                   <thead>
                       <tr>
                           <td>Code Transaksi</td>
                           <td>Tanggal Transaksi</td>
                           <td>sale</td>
                           <td>Item</td>
                           <td>Qty</td>
                           <td>Total Diskon</td>
                           <td>Total Harga</td>
                           <td>Total Bayar</td>
                       </tr>
                   </thead>
                @foreach ($sales as $sale)
                <tbody>
                    <tr>
                        <td>  {{ $sale->code_transaksi }} </td>
                        <td>  {{ $sale->tanggal_transaksi }} </td>
                        <td>  {{ $sale->nama }} </td>
                        <td>  {{ $sale->item_name }} </td>
                        <td>  {{ $sale->qty }} </td>
                        <td>  {{ $sale->total_diskon }} </td>
                        <td>  {{ $sale->total_harga }} </td>
                        <td>  {{ $sale->total_bayar }} </td>
                        <td> <form action="{{ url('sales/delete_sales/'.$sale->code_transaksi) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            <a href="{{ url('sales/edit_sales/'.$sale->code_transaksi)  }}" class="btn btn-success btn-sm ">Edit</a>
                        </form> </td>
                    </tr>
                </tbody>
                @endforeach
               </table>
             </div>
            </div>
       </div>
    </div>
</div>

@endsection
