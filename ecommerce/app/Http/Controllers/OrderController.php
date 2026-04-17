<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order ; 
use App\Models\OrderItem ; 
use App\Models\Product ; 

class OrderController extends Controller
{
    

        public function store(Request $request){

            $validates = $request->validate([
                "address"=>"required|string|min:10"
            ]);


            $cart = session()->get('cart') ; 
            if(!$cart){

                    return redirect()->back()->with('error' , "Cart is empty!") ; 

            }


            $order = Order::create([
                    "user_id"=> auth()->user()->id , 
                    "total_amount" => array_reduce($cart  , fn($total , $item ) =>  $total+ ($item['price'] * $item['quantity']) , 0) , 
                    "address" =>  $request->address , 
                    "status"=>"pending" , 

            ]) ; 


            foreach($cart as $id=> $details){

                    OrderItem::create([
                        'order_id' => $order->id , 
                        "product_id"=>$id , 
                        "quantity" => $details['quantity'] , 
                        "price" => $details["price"] , 

                    ]); 

                    $product = Product::find($id) ; 
                    $product->decrement("stock_quantity" , $details['quantity']) ; 


            }


            session()->forget("cart")  ; 
            return redirect()->route('orders.index')  ;   



            



        }



        public function index(){


                $orders = auth()->user()->orders()->latest()->paginate(20) ; 
                
                // isEmpty() method on the paginator , because Paginator object never empty 
                if($orders->isEmpty()){

                        return redirect()->route('cart.index')->with('info' , "you cart is empty! add some products first.") ; 
                }

                return view('orders.index' , compact("orders")) ; 
        }


        public function show($id){      

                $order = auth()->user()->orders()->with('items.product')->findOrFail($id) ;

                return view('orders.show', compact("order"))  ; 

        }


}
