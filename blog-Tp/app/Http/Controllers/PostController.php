<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post ; 


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = auth()->user()->posts()->with('comments')->get() ; 

        return view('dashboard' , compact('posts')) ; 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')  ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

   
        $validated = $request->validate([
            'title'=> 'required|string|min:5'  , 
            "description"=>"required|string|min:10|max:255",
            "body"=>"required|string|min:20" , 
        ]) ;

        $validated['user_id'] = auth()->id() ; 


        Post::create($validated) ; 

        return redirect()->route('dashboard')->with('success' , "Post added successfully!") ; 
        
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
}
