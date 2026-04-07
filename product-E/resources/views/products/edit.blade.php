<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



        <h1>edit product : {{$product->name}}</h1>

        <div>

            <form   action="/products/{{$product->id}}" method="POST">

                    @csrf 
                    @method('PUT')

                    <label>
                        name
                    </label>
                    <input type="text"   name="name"  value="{{old('name' , $product->name)}}" > 

                    <label>
                        description
                    </label>
                    <input type="text"  name="description" value="{{old('description' , $product->description)}}"> 

                    <label>
                        categories
                    </label>

                    <label>price</label>
                    <input type="number"  name="price" value="{{old('price' , $product->price)}}">

                    <select name="cat_id">


                        @foreach($categories as $id=>$cat)  
                            <option
                                @selected($product->cat_id === $id )
                             value="{{$id}}">{{$cat}}</option>
                        @endforeach

                    </select>

                    <button type="submit">
                        Save 
                    </button>

            </form>

        </div>
    
</body>
</html>