@section('title', 'Add Sales')
@extends('templates/main')
@section('content')    

@if (session('status'))
    <h6 class="alert col-md-6 alert-success">{{ session('status') }}</h6>
@endif
<div class="card col-md-6">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4> Edit sales </h4>
            </div>
            <div class="col-md-2">
                <a href="/sales" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="{{ url('sales/update_sales/'.$sales->code_transaksi) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class='mb-3 row'>
            <label for="tanggal_transaksi" class='col-sm-4 col-form-label'>Tanggal Transaksi</label>
            <div class='col-sm-8'>
                <input type="date"  value="{{$sales->tanggal_transaksi}}" name="tanggal_transaksi"  class='form-control' id="tanggal_transaksi" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="customer" class='col-sm-4 col-form-label'>Customer</label>
            <div class='col-sm-8'>
                <select readonly class="form-select customer" name="customer" id="customer" required>
                    @foreach ($customers as $customer)
                    <option   value="{{ $customer->id }}" {{  ($customer->id === $sales->customer) ? 'selected' : '' }} >{{ $customer->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="item" class='col-sm-4 col-form-label'>Items</label>
            <div class='col-sm-8'>
                <select readonly class="form-select" name="item" id="item" required>
                    @foreach ($items as $item)
                    <option  value="{{ $item->id }}" {{  ($item->id === $sales->item) ? 'selected' : '' }} >{{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
        <div class='mb-3 row'>
            <label for="qty" class='col-sm-4 col-form-label'>Qty</label>
            <div class='col-sm-8'>
                <input type="text" readonly name="qty" value="{{$sales->qty}}" class='form-control' id="qty" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_diskon" class='col-sm-4 col-form-label'>Total Diskon</label>
            <div class='col-sm-8'>
                <input type="text" readonly value="{{$sales->total_diskon}}" name="total_diskon" class='form-control' id="total_diskon" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_harga" class='col-sm-4 col-form-label'>Total Harga</label>
            <div class='col-sm-8'>
                <input type="text" readonly value="{{$sales->total_harga}}" name="total_harga" class='form-control' id="total_harga" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_bayar" class='col-sm-4 col-form-label'>Total Bayar</label>
            <div class='col-sm-8'>
                <input type="text" name="total_bayar" value="{{$sales->bayar}}" class='form-control' id="total_bayar" required>
            </div>
        </div>
        <div class='mb-3 row'>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <input type="submit" value="Edit sales" class="btn btn-primary float-end">
            </div>
        </div>
    </form>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $( "#qty" ).keyup(function() {
                    var a=$(this).parent();
                    var qty = $(this).val();
                    var customer = $('#customer').val(); 
                    var item = $('#item').val(); 
                    console.log(item); 
                    // console.log(customer);
                    var op="";
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findPrice')!!}',
                        data:{'id':customer, 'id_item':item},
                        dataType:'json',//return data will be json
                        success:function(data){
                            var tipe_diskon = data['customer'].tipe_diskon;
                            var diskon = data['customer'].diskon;
                            var price = data['item'].price;
                            console.log(tipe_diskon);
                            if (tipe_diskon == 'persentage') {
                                var total_diskon = (diskon / 100) * price * qty;
                            } else {
                                var total_diskon = diskon ;
                            }
                            var total_harga = (price * qty) - total_diskon;
                            // console.log(total_diskon);
                            $('#total_diskon').val(total_diskon);
                            $('#total_harga').val(total_harga);
                        },
                        error:function(){
                        }
                    })
                });
    });
    </script>


@endsection
