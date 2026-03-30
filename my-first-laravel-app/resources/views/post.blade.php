<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div>
            <a  href="/blog" >Go back <- </a>
            <h1>Post details </h1>
            <p><b>{{$post->title}}</b></p>
            <p>{{$post->body}}</p>
            <p>Created at: {{$post->created_at}}</p>  
            <p>Updated at: {{$post->updated_at}}</p>  


    </div>

    
</body>
</html>