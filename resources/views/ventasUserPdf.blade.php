<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/venta.css')}}">
    <title>Document</title>
</head>
<body>
<h1>Total Ventas Usuarios</h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id Sell</th>
                <th>Id User</th>
                <th>Name</th>
                <th>Pdf</th>
                <th>Times</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventasPdf as $venta )
                 <tr>
                    <td>{{$venta->id_venta}}</td>
                    <td>{{$venta->id_user}}</td>
                    <td>{{$venta->name}}</td>
                    <td><a href="{{ asset($venta->ventaPdf) }}" target="_blank"><img src="{{asset('img/bxs-file-pdf.svg')}}" alt="" srcset=""></a></td>
                    <td>{{$venta->times}}</td>
                    <td><button>Eliminar</button></td>
                 </tr>
         @endforeach
        </tbody>

    </table>
</div>
</body>
</html>
