<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //$product ->category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //product->images
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute(){
        $featuredimage = $this->images()->where('featured',true)->first();
        if(!$featuredimage){
            $featuredimage = $this->images()->first();}
        if($featuredimage){
            return $featuredimage->url;}

        return '/images/default.png';
    }
    public function getCategoryNameAttribute(){
        if($this->category)
            return $this->category->name;
        return 'SIN CATEGORIA';
    }   
}
