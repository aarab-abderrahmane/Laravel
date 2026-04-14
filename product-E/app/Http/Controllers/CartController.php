<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Cart ; 

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {                                                   
        $cartItems = Cart::with('product')->get() ; 

        $globalTotal = $cartItems->sum(function($item){

            return $item->quantity * $item->product->price ;

        }) ;

        return view('cart.index' , compact('cartItems')) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $validated = $request->validate([
                'product_id'=>'required|integer|exists:products,id',
            ]);
            $cartItem = Cart::where('product_id', $request->product_id)->first();

            if($cartItem){
                $cartItem->increment("quantity") ; 
            }else{
                Cart::create([
                    'product_id'=>$request->product_id ,
                    'quantity'=>1 
                ]);
            }

            return redirect()->route('products.index')->with('succes',"added to cart successfully!");
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function increment($id){
        $cartItem = Cart::findOrFail($id) ; 
        $cartItem->increment('quantity') ; 
        return back()  ; 
    }

    public function decrement($id){
        $cartItem = Cart::findOrFail($id) ; 
        if($cartItem->quantity > 1 ){
            $cartItem->decrement('quantity') ; 
        }else {
            $cartItem->delete() ; 
        }

        return back() ; 
    }
}
