<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //Listado
    }
    public function create(){
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); // Formulario de registro
    }
    public function store(Request $request){
        //validar
        $messages = [
            'name.required'=>'Es necesario ingresar un nombre para el producto',
            'name.min'=>'El nombre debe tener 3 o más caracteres',
            'description.required' => 'La descripción no puede ir vacia',
            'price.required' => 'El precio no puede ser vacio',
            'price.numeric' => 'El precio debe ser un numero',
            'price.min' => 'El valor debe ser mayor que 0',
        ];
        $rules = [
            'name'=> 'required|min:3', 
            'description'=> 'required',
            'price'=> 'required|numeric|min:0',
            
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save();
        
        return redirect('/admin/products');
        //Registrar nuevo producto
        
    }
    public function edit($id){
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product','categories')); // Formulario de registro
    }
    public function update(Request $request, $id){
        $messages = [
            'name.required'=>'Es necesario ingresar un nombre para el producto',
            'name.min'=>'El nombre debe tener 3 o más caracteres',
            'description.required' => 'La descripción no puede ir vacia',
            'price.required' => 'El precio no puede ser 0 o vacio',
            'price.numeric' => 'El precio debe ser un numero',
            'price.min' => 'El valor debe ser mayor que 0'
        ];
        $rules = [
            'name'=> 'required|min:3', 
            'description'=> 'required',
            'price'=> 'required|numeric|min:0',
            
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->category_id=$request->category_id;
        $product->save();
        
        return redirect('/admin/products');
        //Registrar nuevo producto
    }
    public function destroy($id){
        ProductImage::where('product_id',$id)->delete();
        $product = Product::find($id);
        $product->delete();
        
        return back();
    }
    public function show($id){
    
    }
}
