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

                $total_quantity = $cart[$product->id]['quantity']  + $request->quantity ; 

                if( $total_quantity >  $product->stock_quantity){

                    return redirect()->back()->with('error' , "it reached  the maximum limit") ; 
                }

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

        $total = array_reduce($cart , function($total , $item) {

            return  $total += $item['quantity'] * $item['price'] ; 

        } , 0) ; 

        $count = count($cart);

        return view('cart.index' , compact("cart" , "total" , "count")  ) ; 
    }



    public function update(Request $request , $id){

        $product = Product::findOrFail($id) ; 
        $cart = session()->get('cart' , []) ; 


        $remaining_quantity  = $product->stock_quantity - $cart[$id]['quantity'] ; 
        $request->validate([
            'quantity'=>'required|string|max:'.$remaining_quantity
        ]) ; 

    

        if(isset($cart[$id])){

            
            $cart[$id]['quantity'] += $request->quantity ; 

        }

    }

}
