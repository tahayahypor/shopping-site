<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {   

        $products = Product::query();

        // if($keyword = request('search')) {
        //     $products->where('title' , 'LIKE' , "%{$keyword}%")->orWhere('id' , 'LIKE' , "%{$keyword}%" );
        // }

        $products = Product::latest()->get();
        return view('index' , compact(['products']));
    }

    public function show()
    {
        $products = Product::latest()->paginate(10);
        return view('products.products' , compact('products'));       
    }

    public function singleProducts(Product $product)
    {
        return view('products.single' , compact('product'));
    }
    
}
