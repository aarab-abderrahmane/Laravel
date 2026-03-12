<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public  $POSTS = [
    ["id" => 1 , "title" => "First Post" , "content" => "This is the content of the first post"],
    ["id" => 2 , "title" => "Second Post" , "content" => "This is the content of the second post"],
    ["id" => 3 , "title" => "Third Post" , "content" => "This is the content of the third post"],
    ] ;

    public function index(){

        return view('blog.index' , ["posts" => $this->POSTS] );
    }

    public function show($id){
            $post = null ; 
            foreach($POSTS as $p){
                if($p['id'] == $id){
                    $post = $p ; 
                    break ; 
                }
            }

            if($post == null ){
                abort(404);
            }
            return view('blog.show' , ['post'=>$post]);
    }
}
