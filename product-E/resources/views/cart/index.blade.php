<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://jsdelivr.net">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>


    <div  class="border border-1 border-black p-2">

        @foreach($cartItems as $item)

            <div class="flex justify-between border m-2  ">
                <p>product name : {{$item->product->name}}</p>
                <p>price : {{$item->product->price}}</p>
                <p><b>{{$item->product_id}}</b></p>
                <div class="bg-yellow-400 flex gap-2">

                       <p>quantity : {{$item->quantity}}</p>
                       <form action="{{route('cart.increment' , $item->id)}}" method="POST" >
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="bg-green-500 border border-black p-2" >+</button>
                       </form>
                       <form action="{{route('cart.decrement' , $item->product_id)}}" method="POST" >
                                <button type="submit" class="bg-red-500 border border-black p-2" >-</button>
                       </form>

                </div>

                <p>total : {{$item->product->price * $item->quantity}}</p>
            </div>

        @endforeach

        <h1>
            <b>Global Total : {{$cartItems->sum(fn($item)=> $item->quantity * $item->product->price)}} </b>
        </h1>

    </div>

    
</body>
</html>