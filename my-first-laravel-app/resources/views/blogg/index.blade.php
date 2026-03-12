
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div>
        <h1>Blog Posts<h1/>
        <ul>
            @foreach($posts as $post)
                <li>
                    title : {{$post['title']}}
                    \n
                    content : {{$post['content']}}
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>