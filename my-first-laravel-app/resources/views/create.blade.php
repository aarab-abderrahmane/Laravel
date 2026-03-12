<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Post</title>
</head>
<body>


        <h1>Create new Post </h1>

        <form method="POST" action="/blog/store">

                @csrf

                <label>Title:</label><br>
                <input type="text" name="title"><br><br>

                <label>Body:</label><br>
                <textarea name="body" rows="5" cols="40"></textarea><br><br>

                <button type="submit">Save Post</button>

        </form>
    
</body>
</html>