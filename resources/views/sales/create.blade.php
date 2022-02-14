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
                <h4> Add New sales </h4>
            </div>
            <div class="col-md-2">
                <a href="/sales" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="/sales/add_sales" method="post" enctype="multipart/form-data">
        @csrf
        <div class='mb-3 row'>
            <label for="tanggal_transaksi" class='col-sm-4 col-form-label'>Tanggal Transaksi</label>
            <div class='col-sm-8'>
                <input type="date" name="tanggal_transaksi" class='form-control' id="tanggal_transaksi">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="customer" class='col-sm-4 col-form-label'>Customer</label>
            <div class='col-sm-8'>
                <select class="form-select customer" name="customer" id="customer">
                    <option selected>Chosee Customers ... </option>
                    @foreach ($customers as $customer)
                    <option   value="{{ $customer->id }}">{{ $customer->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="item" class='col-sm-4 col-form-label'>Items</label>
            <div class='col-sm-8'>
                <select class="form-select" name="item" id="item">
                    <option selected>Chosee Items </option>
                    @foreach ($items as $item)
                    <option  value="{{ $item->id }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
        <div class='mb-3 row'>
            <label for="qty" class='col-sm-4 col-form-label'>Qty</label>
            <div class='col-sm-8'>
                <input type="text" name="qty" class='form-control' id="qty">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_diskon" class='col-sm-4 col-form-label'>Total Diskon</label>
            <div class='col-sm-8'>
                <input type="text" readonly name="total_diskon" class='form-control' id="total_diskon">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_harga" class='col-sm-4 col-form-label'>Total Harga</label>
            <div class='col-sm-8'>
                <input type="text" readonly name="total_harga" class='form-control' id="total_harga">
            </div>
        </div>
        <div class='mb-3 row'>
            <label for="total_bayar" class='col-sm-4 col-form-label'>Total Bayar</label>
            <div class='col-sm-8'>
                <input type="text" name="total_bayar" class='form-control' id="total_bayar">
            </div>
        </div>
        <div class='mb-3 row'>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <input type="submit" value="Add sales" class="btn btn-primary float-end">
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
