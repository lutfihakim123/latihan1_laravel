<?php

namespace App\Http\Controllers;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ItemsController extends Controller
{
    public function index()
    {
        $items = Items::all();
        return view('items.index', compact('items'));
    }
    public function create()
    {
        return view('items.create');
    }
    public function store(Request $request)
    {
        $items = new Items;
        $items->item_name = $request->input('item_name');
        $items->unit = $request->input('unit');
        $items->stock = $request->input('stock');
        $items->price = $request->input('price');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/items/', $filename);
            $items->image = $filename;
        }
        $items->save();
        return redirect()->back()->with('status','Add Items Successfull');
    }
    public function edit($id)
    {
        $items = Items::find($id);
        return view('items.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $items = Items::find($id);
        $items->item_name = $request->input('item_name');
        $items->unit = $request->input('unit');
        $items->stock = $request->input('stock');
        $items->price = $request->input('price');

        if($request->hasfile('image'))
        {
            $destination = 'uploads/items/'.$items->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/items/', $filename);
            $items->image = $filename;
        }

        $items->update();
        return redirect()->back()->with('status','Update Items Succesfull');
    }

    public function destroy($id)
    {
        $items = Items::find($id);
        $destination = 'uploads/items/'.$items->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $items->delete();
        return redirect()->back()->with('status','Delete Items SuccessFull');
    }
}
