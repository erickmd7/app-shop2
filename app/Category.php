<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $messages = [
        'name.required'=>'Es necesario ingresar un nombre para el producto',
        'name.min'=>'El nombre debe tener 3 o más caracteres',
        'description.required' => 'La descripción no puede ir vacia',
    ];
    public static $rules = [
        'name'=> 'required|min:3', 
        'description'=> 'required|max:20',            
    ];
    protected $fillable = ['name','description'];
    // $categoty->product
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function getFeaturedImageUrlAttribute(){
        if($this->image)
            return '/images/categories/'.$this->image;
        $firstProduct = $this->products()->first();
        if($firstProduct)
            return $firstProduct->featured_image_url;
        return '/images/default.png';
    }
}
