<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="/style.css" > -->
<!-- </head>
<body> --> 

    <!-- <div  class =" bg-emerald-500 border border-black border-2">
        <h1>Welcome to My Blog</h1>
        <p>Here you will find all my posts.</p>
    </div> -->


@extends('layouts.app')

@section('content')

    <h1>Welcome to My Blog</h1>


    <a href="/blog/create">add new blog </a>
    
    @foreach ($posts as $post)
            
           <div class="border border-black m-3 p-2 flex flex-col gap-6 items-start">
                 <h2>{{$post->title}}</h2>
                 <p>{{$post->body}}</p>
                <a class="bg-blue-500 p-4" href="/blog/{{$post->id}}">open details</a>
                <a class="bg-blue-500 p-4" href="/blog/edit/{{$post->id}}">edit blog</a>

                <form  method="POST" action="/blog/delete/{{$post->id}}">
                    @csrf 
                    @method('DELETE')
                    <button class="bg-red-500 p-4" type="submit" >delete</a>
                    
                </form>
                
           </div>
    

    @endforeach


@endsection
<!-- </body>
</html> -->