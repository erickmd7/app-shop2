<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use File;
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
        $category = Category::create($request->only('name','description'));//mass asignment
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            if($moved){
                //Crear registro en la tabla product_images
                $category->image = $fileName;
                $category->save();
            }

        }

        return redirect('/admin/categories');
        //Registrar nuevo categoria
        
    }
    public function edit(Category $category){
        return view('admin.categories.edit')->with(compact('category')); // Formulario de registro
    }
    public function update(Request $request,Category $category){
        $this->validate($request, Category::$messages, Category::$rules);
        $category->update($request->only('name','description'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            if($moved){
                $previousPath = $path . '/' . $category->image;
                //Crear registro en la tabla product_images
                $category->image = $fileName;
                $saved = $category->save();
                if($saved)
                    File::delete($previousPath);
            }

        }
        return redirect('/admin/categories');
    }
    public function destroy(Category $category){
        $category->delete();
        $success = "Eliminado correctamente";
        return back()->with(compact('success'));
    }

}
