<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
        
    }
    public function create(){
        return view('admin.categories.create');
        
    }
    public function store(Request $request){
        //validar
        $this->validate($request, Category::$messages, Category::$rules);
        // dd($request->all());
        Category::create($request->all());//mass asignment
        return redirect('/admin/categories');
        //Registrar nuevo categoria
        
    }
    public function edit(Category $category){
        return view('admin.categories.edit')->with(compact('category')); // Formulario de registro
    }
    public function update(Request $request,Category $category){
        $this->validate($request, Category::$messages, Category::$rules);
        $category->update($request->all());
        return redirect('/admin/categories');
    }
    public function destroy(Category $category){
        $category->delete();
        $success = "Eliminado correctamente";
        return back()->with(compact('success'));
    }

}
