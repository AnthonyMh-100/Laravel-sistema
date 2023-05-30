<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>
        <div>

            <form action="{{route('updateProduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ( $product as $item)
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$item->name}}">
                </div>
                <div>
                    <label for="Description">Description</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{$item->descripcion}}">
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" value="{{$item->precio}}">
                </div>
                <div>
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" id="stock" value="{{$item->stock}}">
                </div>
                <div>
                    <label for="img">Img</label>
                    <input type="file" name="img" id="img" value="{{$item->img}}">
                <div>
                     <input type="hidden" value="{{$item->id_product}}" name="id">
                    <input type="submit" value="Update">
                </div>
                @endforeach
            </form>
        </div>
    </div>
</body>
</html>
