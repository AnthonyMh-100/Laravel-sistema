<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

    <title>Home</title>
</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @include('header')

    <div class="container">
        <section  class="section1">
            <h1>Lista de Productos</h1>
            @if (session('status'))
                <p>{{session('status')}} </p>
            @endif
            <form action="{{route('filtrar')}}" method="post">
                @csrf
                <input type="text" name="filtrar" placeholder="Filtro de Productos" maxlength="25">
                <button type="submit"><img src="{{asset('img/search.svg')}}" alt="" srcset=""></button>
            </form>
        </section>
        <section class="section2">
            @if (empty($products))
                <h1>Producto no Encontrado</h1>
            @endif
            @foreach ( $products as $product)
          <form action="{{route('addCart')}}" method="POST" class="box-products">
            @csrf
            <span class="img">
                <img src="{{ asset($product->img) }}" alt="Fruta">
            </span>
            <span>
                <p for="">{{$product->name}}</p>
            </span>
            {{--  <span>
                <label for="">Descripcion</label>
                <p for="">{{$product->descripcion}}</p>

            </span>  --}}
            <span style="display:flex; gap:10px; flex-direction:row">
                <label for="">Price</label>
                <p for="">S/. {{$product->precio}}</p>
            </span>
            <span class="cantidad" style="display:flex; gap:10px; flex-direction:row">
                <label for="">Quanity</label>
               <input type="number" name="quantity" placeholder="0" id="quantity" min="0" required>
            </span>
            <span>
                <input type="hidden" name="id_product" value="{{$product->id_product}}">
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">

               <input type="submit" value="Agregar">
            </span>
        </form>
          @endforeach
        </section>
     </div>

</body>

</html>
