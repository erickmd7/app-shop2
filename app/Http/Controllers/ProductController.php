<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //Listado
    }
    public function create(){
        return view('admin.products.create'); // Formulario de registro
    }
    public function store(Request $request){
       // dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
         //Registrar nuevo producto
        
    }
    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); // Formulario de registro
    }
    public function update(Request $request, $id){
       // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
         //Registrar nuevo producto
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();

        return back();
    }
}
