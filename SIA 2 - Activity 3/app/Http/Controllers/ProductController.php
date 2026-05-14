<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(6);
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'quantity'=>'required|integer',
            'price'=>'required|numeric',
            'supplier'=>'required',
            'image'=>'nullable|image'
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('products','public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success','Added!');
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $data = $request->all();

        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products','public');
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product){
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return back();
    }
}
