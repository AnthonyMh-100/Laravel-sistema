<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

    <title>Document</title>
</head>
<body>
    <h1>Boleta de Compra</h1>
    <h3><strong>Cliente : {{Auth::user()->name}}</strong></h3>
    <h3><strong>Fecha : {{$currentDateTime}}</strong></h3>

    <h4>Lista de Productos</h4>
    <table class="table ticket-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($carrito))
            @php
            $total = 0;
             @endphp
                @foreach ($carrito as $cart_item)
                    <tr>
                        <td>{{ $cart_item["id"] }}</td>
                        <td> {{ $cart_item["name"] }}</td>
                        <td>S/. {{number_format($cart_item['price'], 2, ',', '.');  }} </td>
                        <td>{{ $cart_item['quantity'] }}</td>
                        <td>S/. {{ number_format($cart_item['total'], 2, ',', '.'); }}</td>
                    </tr>
                      @php
                      $total += $cart_item['total'];
                      @endphp
                @endforeach
                {{--  <tr>
                    <td colspan="4">Venta Total</td>
                    <td>S/. {{ number_format($total, 2, ',', '.'); }}</td>
                </tr>  --}}
            @endif
        </tbody>
    </table>

    <div class="total">
      <h3>Venta Total</h3>
      <h3>S/. {{ number_format($total, 2, ',', '.'); }}</h3>
    </div>
</body>
</html>
