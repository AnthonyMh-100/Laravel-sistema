<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/addProduct.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('add_product')}}" method="post" class="form" enctype="multipart/form-data">
            <h1>Agregar Producto</h1>
            @csrf
          <div>
            <label for="">Name</label>
            <input type="text" name="name">
          </div>
          <div>
            <label for="">Description</label>
            <input type="text" name="description">
          </div>
          <div>
            <label for="">Price</label>
            <input type="text" name="price">
          </div>
          <div>
            <label for="">Stock</label>
            <input type="text" name="stock">
          </div>
          <div>
            <label for="">Img</label>
            <input type="file" name="img">
          </div>
          <div>
            <input type="submit" value="Agregar">
          </div>
        </form>
    </div>

</body>
</html>
