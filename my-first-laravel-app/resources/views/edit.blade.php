<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


        <div>   
                <a href="/blog">← Back to Blog</a>


                <form  method="POST" action="/blog/update/{{$post->id}}">
                    
                    @csrf 
                    @method('PUT')

                    <input type="text" name="title" value="{{$post->title}}"  />
                    <textarea type="text" rows="5" name="body"  >{{$post->body}}</textarea>
                    <button  type="submit">update</button>

                </form>



        </div>

    
</body>
</html>