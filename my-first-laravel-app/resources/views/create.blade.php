<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Post</title>
</head>
<body> -->
@extends('layouts.app')
@section('content')


        <h1>Create new Post </h1>

        <form method="POST" action="/blog/store">

                @csrf

                <label>Title:</label><br>
                <input type="text" name="title" value="{{old('title')}}" ><br><br>

                @error('title')
                        <p class="alert-error">{{$message}}</p>
                @enderror

                <label>Body:</label><br>
                <textarea name="body" rows="5" cols="40">{{old('body')}}</textarea><br><br>

                @error('body')
                        <p class="alert-error">{{$message}}</p>
                @enderror

                <button type="submit">Save Post</button>

        </form>


@endsection
    
<!-- </body>
</html> -->