<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">

    <title>Registro Usuarios</title>
</head>
<body>

    <main class="menu">
        <section class="section1">
         <a href="{{ route('home') }}">Ir al Home</a>
         <a href="{{route('product')}}">Agregar Producto</a>
         <a href="{{ route('viewProducts') }}">Ver Productos</a>
         <a href="http://localhost/auth/auth-laravel/public/dashborad">Ir a Usuarios</a>
        </section>
         <section class="section2">
             <form action="{{ route('logout') }}" method="POST">
                 @csrf
                 <label for="">{{Auth::user()->name}}</label>
                 <button type="submit"><img src="{{asset('img/bx-power-off (1).svg')}}" alt="" srcset=""></button>
             </form>
         </section>
     </main>


    <section>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('statusDelete'))
        <h2><strong>{{session('statusDelete')}}</strong></h2>
    @endif

    </section>
    <div class="container">
        <h1>Registro Productos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Code Producto</th>
                    <th>Name</th>
                    <th>Descripcion</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Img</th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id_product}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->descripcion}}</td>
                    <td>{{$product->precio}}</td>
                    <td>{{$product->stock}}</td>
                    <td><img src="{{asset($product->img)}}" alt="mi imagen" srcset="" width="80" height="50"></td>
                    <td>
                        <a href="{{ route('editProduct', ['id_edit' => $product->id_product]) }}">Edit</a>
                        <a href="{{ route('deleteProduct', ['id_delete' => $product->id_product]) }}">Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>{{ $products->links() }}</span>
    </div>


    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
