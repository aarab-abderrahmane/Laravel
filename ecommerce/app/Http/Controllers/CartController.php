<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ; 

class CartController extends Controller
{


    public function add(Request $request , Product $product){


            $validated = $request->validate([

                "quantity"=> 'required|integer|min:1|max:'.$product->stock_quantity 
            ]) ; 

            $cart = session()->get('cart', []) ; 

            if(isset($cart[$product->id])){

                $cart[$product->id]['quantity'] += $request->quantity ; 
            }else{

                $cart[$product->id]=[
                    "name"=> $product->name  , 
                    "quantity" => $request->quantity ,
                    "price"=> $product->price , 
                    "image" => $product->image  

                ] ; 

            }


            session()->put("cart", $cart) ; 

            return redirect()->back()->with('success', "Product  added to cart!") ; 



    }        



    public function index(){

        $cart = session()->get("cart" , []) ; 

        return view('cart.index' , compact("cart")) ; 
    }

}
