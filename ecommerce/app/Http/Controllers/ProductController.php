<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ; 


class ProductController extends Controller
{
    

    public function index(){

        $cart = session()->get("cart" ,[]) ; 

        $products = Product::where('is_active' , true)->with('categories')->latest()->paginate(6) ; 
        return view('products.index' , [
            "products"=>$products , 
            "count" => count($cart) ,
        ]) ; 


    }

    public function show($slug){
        $product = Product::where("slug" ,$slug )->firstOrFail() ; 

        if( ! $product->is_active){
            abort(404) ; 
        }

        return view('products.show' , compact("product")) ; 
    }


}
