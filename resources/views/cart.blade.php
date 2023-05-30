<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">

    <title>Carrito</title>
</head>

<body>

    <div class="container">
        <h1>Tu Carrito de Compras {{Auth::user()->name}}</h1>

        <div class="enlaces">
            <a href="{{route('home')}}">Ir a Home</a>
            <a href="{{route('generateSale')}}">Generar Venta</a>
            @if (session('msg'))
            <h2>{{session('msg')}}</h2>
            <a href="{{route('generatePdf')}}">Ticket</a>
        @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($cartProducts))
                @php
                $total = 0;
            @endphp
                    @foreach ($cartProducts as $cart_item)

                        <tr>
                            <td>{{ $cart_item["id"] }}</td>
                            <td> {{ $cart_item["name"] }}</td>
                            <td>{{number_format($cart_item['price'], 2, ',', '.');  }} </td>
                            <td>{{ $cart_item['quantity'] }}</td>
                            <td>{{ number_format($cart_item['total'], 2, ',', '.'); }}</td>
                            <td>
                                <form action="{{ route('deleteProductCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$cart_item["id"]}}" name="id">
                                    <button type="submit" class="btn btn-danger"><img src="{{asset('img/bx-trash.svg')}}" alt="" srcset=""></button>
                                </form>
                            </td>
                        </tr>
                          @php
                          $total += $cart_item['total'];
                          @endphp
                    @endforeach
                @endif
            </tbody>
        </table>
        <span class="span1">
            <section>Total</section>
            <section>S/.{{ number_format($total, 2, ',', '.'); }}</section>
        </span>
    </div>
</body>

</html>









