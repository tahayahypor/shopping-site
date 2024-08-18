<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('title' , 'LIKE' , "%{$request->search}%")->get();
        return view('search' , compact('products'));
    }
}
