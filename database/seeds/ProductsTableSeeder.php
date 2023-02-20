<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/
        $categories = factory(Category::class, 3)->create();
        $categories->each(function ($category) {
            $products = factory(Product::class, 10)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 2)->make();
                $p->images()->saveMany($images);
            }
            );
        });   
    }
}
