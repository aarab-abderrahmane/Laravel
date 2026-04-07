<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProductRequest ; 
use App\Models\Product ; 
use App\Models\Categorie ; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all() ; 
        return view('products.index'  , compact("products")) ; 

    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Categorie::pluck('name' , "cat_id") ; 
        return view('products.create' , compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        $validated = $request->validated() ; 

        Product::create($validated) ; 

        return redirect()->route("products.index")->with('success' , "Product created successfully!") ; 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $target_product = Product::find($id) ; 
        return view('products.show' , ["product"=>$target_product]) ; 
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $categories = Categorie::pluck('name' , "cat_id") ; 
        $target_product = Product::find($id)  ; 
        return view('products.edit' , ["product"=>$target_product , "categories"=>$categories]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request , string $id)
    {
        
        $product  = Product::findOrFail($id) ; 

        $validated = $request->validated()  ;

        $product->update($validated) ;


        return redirect()->route('products.index')->with('success' , 'product name '.$product->name.'updated successfully') ; 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $target_product = Product::find($id) ; 

        $target_product->delete()  ; 


        // or :
        // Product::destroy($id)

        return redirect()->route('products.index')->with('delete' , "delete product successfully");
    }
}
