<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post ;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    
    public function index(){
        
        // return view('blog');
        $posts = Post::all();
        return view('blog' , ['posts'=>$posts]) ; 
 

        }


    public function show($id){

        $post = Post::find($id) ; 
        return view('post' ,['post'=>$post]);
    }


    public function create(){

         return view('create');

    }

    public function store()
        {
            request()->validate([
                
                'title' => 'required|min:3|max:200',
                'body'=> 'required|min:10', 

            ]);

            Post::create([
                'title' => request('title'),
                'body'  => request('body'),
            ]);

            return redirect('/blog');
    }


    public function destroy($id){

        $post  = Post::find($id) ; 
        $post->delete() ; 
        return redirect('/blog');

    }


    public function edit($id){

        $post  = Post::find($id) ; 
        return view('edit' , ["post"=>$post]) ; 

    }


    public function update($id){

        request()->validate([

            'title'=>'required|min:3|max:200', 
            'body'=>'resuired|min:10',

        ]);

        $post = Post::find($id) ; 
        
        $post->title = request('title');
        $post->body = request("body"); 
        $post->save() ; 

        return redirect('/blog');

    }



}
