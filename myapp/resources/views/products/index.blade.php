<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    

    <div class="bg-amber-300 my-3">
        @foreach($products as $product)
            <div class="my-3" >
                <h1>email {{$product->email}}</h1>
                
                <p>description :{{$product->description}}  </p>
            </div>
        @endforeach
    </div>

</body>
</html>