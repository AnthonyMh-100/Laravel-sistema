<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/users.css') }}" rel="stylesheet">
    <title>Registro Usuarios</title>
</head>
<body>

    <main class="menu">
       <section class="section1">
        <a href="{{ route('home') }}">Ir al Home</a>
        <a href="{{ route('viewProducts') }}">Ver Productos</a>
        <a href="{{route('register')}}">Registrar Usuario</a>
        <a href="{{route('ventasPdf')}}">Venta Usuarios</a>

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
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </section>
    <div class="container">
        <h1>Registro Usuarios</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('editUser', ['id_edit' => $user->id]) }}"><img src="{{asset('img/bx-edit-alt.svg')}}" alt="" srcset=""></a>
                            <a href="{{ route('deleteUser', ['id_delete' => $user->id]) }}"><img src="{{asset('img/bx-trash.svg')}}" alt="" srcset=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <span>   {{ $users->links() }}</span>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
