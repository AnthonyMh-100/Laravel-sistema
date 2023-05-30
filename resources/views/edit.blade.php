<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
    <title>Editar Registro</title>
</head>
<body>

    <div class="container">
        @foreach ($user as $data)
        <form action="" method="post">
            <h1>Editar Registro</h1>
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{$data->name}}">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{$data->email}}">
            </div>
            <div>
                <label for="role">Role</label>
                <input type="text" name="role" id="role" value="{{$data->role}}">
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>
