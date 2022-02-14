<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Customers;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }
    public function create()
    {
        $items = Items::all();
        $customers = Customers::all();
        return view('sales.create', 
            compact('items'),
            compact('customers')
        );
    }
    public function findPrice(Request $request){
	

		//it will get price if its id match with product id
		$p['customer'] = Customers::select('diskon','tipe_diskon')->where('id',$request->id)->first();
		$p['item'] =Items::select('price')->where('id',$request->id_item)->first();
    	return response()->json($p);

	}

    public function edit($id)
    {
        // dd($id);
        $sales = Sales::select('code_transaksi', 'tanggal_transaksi', 'customer', 'item', 'qty', 'total_diskon', 'total_harga', 'total_bayar')->where('code_transaksi', $id)->first();
        $items = Items::all();
        $customers = Customers::all();
        return view('sales.edit', 
        compact('items'),
        compact('customers')
    )->with(compact('sales'));
    }

    public function store(Request $request)
    {
        $sales = new Sales;
        $sales->tanggal_transaksi = $request->input('tanggal_transaksi');
        $sales->customer = $request->input('customer');
        $sales->item = $request->input('item');
        $sales->qty = $request->input('qty');
        $sales->total_diskon = $request->input('total_diskon');
        $sales->total_harga = $request->input('total_harga');
        $sales->total_bayar = $request->input('total_bayar');
        $sales->save();
        return redirect()->back()->with('status','Add Sales Successfull');
    }
   
    public function update(Request $request, $id)
    {
        $sales = Sales::select('code_transaksi', 'tanggal_transaksi', 'customer', 'item', 'qty', 'total_diskon', 'total_harga', 'total_bayar')->where('code_transaksi', $id)->first();
        $sales->tanggal_transaksi = $request->input('tanggal_transaksi');
        $sales->customer = $request->input('customer');
        $sales->item = $request->input('item');
        $sales->qty = $request->input('qty');
        $sales->total_diskon = $request->input('total_diskon');
        $sales->total_harga = $request->input('total_harga');
        $sales->total_bayar = $request->input('total_bayar');
        $sales->update();
        return redirect()->back()->with('status','Update Sales Succesfull');
    }

    public function destroy($id)
    {
        $sales = Sales::select('code_transaksi', 'tanggal_transaksi', 'customer', 'item', 'qty', 'total_diskon', 'total_harga', 'total_bayar')->where('code_transaksi', $id)->first();
        $sales->delete();
        return redirect()->back()->with('status','Delete Customers SuccessFull');
    }
}
