<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>


        <h1>Create new Product ! </h1>
        
        <form action="/products" method="POST" >
            @csrf 
            
            <div class=" d-flex flex-column  gap-4  w-25">   

            <input 
             name="name" 
             type="text"
             placeholder="place product title here"
             value="{{old('name')}}"
             >    

             @error('name')

                <span class="alert alert-danger">{{$message}}</span>

             @enderror

            <input
                type="text" 
                name="description"
                placeholder="product description"
                value="{{old('description')}}" 
            >
            </div>

            @error('description')
                <span class="alert alert-danger">{{$message}}</span>

            @enderror

            <input
                type="number" 
                name="price" 
                max="500" 
                placeholder="product price"
                value="{{old('price')}}"
            >   


              @error('price')
                <span class="alert alert-danger">{{$message}}</span>

            @enderror
            
            <select 
                name="cat_id"    
                value='{{old("cat_id")}}'
            >

                @foreach($categories as $id=> $name )
                    <option  value="{{$id}}">{{$name}}</option>

                @endforeach

            </select>


            <button  class="btn btn-success" type="submit">
                Create
            </button>



        </form>


</body>
</html>