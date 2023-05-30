<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.blade.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container overlay">
        <form action="" method="post">
            <h1>login</h1>

            @csrf
          <div>
            <label for="">Email</label>
            <input type="email" name="email" id="" autofocus value="{{old('email')}}"><br>
            @error('email') {{$message}} @enderror
          </div>
          <div>
            <label for="">Password</label>
            <input type="password" name="password" id=""><br>
            @error('password') {{$message}} @enderror

          </div>
          <div>
            <label for="remember">
                <input type="checkbox" name="remember" id="remember">
                 Recuedar mi Sesion
            </label>
          </div>
          <div>
            <input type="submit" value="Entrar">
          </div>
          <a href="{{route('register')}}">Registrar</a>

        </form>
    </div>


     {{--  @if ($errors->any())
        <ul>
    @foreach ($errors->all() as $error )
         <li>{{$error}}</li>
    @endforeach
        </ul>
    @endif  --}}
</body>
</html>
