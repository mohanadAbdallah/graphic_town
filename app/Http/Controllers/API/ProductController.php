<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show_all_products(){


        $products=Product::all();

        return response()->json([
           'status'=>200,
           'products'=>$products,
        ]);
}
public function show_products(category $category){


        $products=$category->Product;

        return response()->json([
           'status'=>200,
           'products'=>$products,
        ]);
}
}
