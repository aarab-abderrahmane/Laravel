<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>



        <div>
            <a class="border-1" href="/products/create">
                create a new product
            </a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{session("success")}}
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-warning">
                    {{session("delete")}}
                </div>
            @endif
        </div>
        <div class=" d-flex flex-wrap m-4 gap-4 ">


            @foreach($products as $product)

                <div class="border "  style='width: 200px'  >

                    <h1>{{$product->name}}</h1>
                    <p>{{$product->description}}</p>
                    <p class="bg-success" ><b>{{$product->price}}DOLLAR</b></p>
                    <a class="bg-primary text-black" href="/products/{{$product->id}}/edit">edit product</a>
                    <form action="/products/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >DELETE</button>

                    </form>

                </div>
            
            @endforeach


        </div>

    
</body>
</html>