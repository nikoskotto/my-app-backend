<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function get()
    {
        $products = Product::with('category')->get();
        return response()->json(['products' => $products]);
    }
    
}