<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $product_count = Product::count();

        return view('admin.index' , compact(['user_count' , 'product_count']));
    }
}
