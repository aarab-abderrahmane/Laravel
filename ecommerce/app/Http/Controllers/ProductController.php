<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ; 

class ProductController extends Controller
{
    

    public function index(){


        $products = Product::where('is_active' , true)->with('categories')->latest()->paginate(6) ; 
        return view('products.index' , compact("products")) ; 


    }

    public function show($slug){
        $product = Product::where("slug" ,$slug )->firstOrFail() ; 

        if( ! $product->is_active){
            abort(404) ; 
        }

        return view('products.show' , compact("product")) ; 
    }


}
