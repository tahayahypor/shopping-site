<?php

namespace App\Http\Controllers;
 use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function products()
   {
     $products = Product::latest()->paginate(15);
     return view('products.products' , compact('products'));
   }

   public function single(Product $product)
{ 
    return view('products.single-product' , compact('product'));

}

}