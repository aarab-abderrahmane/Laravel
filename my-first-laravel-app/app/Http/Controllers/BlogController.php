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
            Post::create([
                'title' => request('title'),
                'body'  => request('body'),
            ]);

            return redirect('/blog');
        }


}
