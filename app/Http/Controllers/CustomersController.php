<?php
namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index', compact('customers'));
    }
    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        $customers = new Customers;
        $customers->nama = $request->input('nama');
        $customers->contact = $request->input('contact');
        $customers->email = $request->input('email');
        $customers->alamat = $request->input('alamat');
        $customers->diskon = $request->input('diskon');
        $customers->tipe_diskon = $request->input('tipe_diskon');
        if($request->hasfile('ktp'))
        {
            $file = $request->file('ktp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/customers/', $filename);
            $customers->ktp = $filename;
        }
        $customers->save();
        return redirect()->back()->with('status','Add Customers Successfull');
    }
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('customers.edit', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customers::find($id);
        $customers->nama = $request->input('nama');
        $customers->contact = $request->input('contact');
        $customers->email = $request->input('email');
        $customers->alamat = $request->input('alamat');
        $customers->diskon = $request->input('diskon');
        $customers->tipe_diskon = $request->input('tipe_diskon');

        if($request->hasfile('ktp'))
        {
            $destination = 'uploads/customers/'.$customers->ktp;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('ktp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/customers/', $filename);
            $customers->ktp = $filename;
        }

        $customers->update();
        return redirect()->back()->with('status','Update Customers Succesfull');
    }

    public function destroy($id)
    {
        $customers = Customers::find($id);
        $destination = 'uploads/customers/'.$customers->ktp;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $customers->delete();
        return redirect()->back()->with('status','Delete Customers SuccessFull');
    }
}
