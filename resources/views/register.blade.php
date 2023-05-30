<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('css/register.css')}}">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Register</h1>

            @csrf
            <div>
                <label for="">Name</label>
                <input type="text" name="name" id="">
              </div>
          <div>
            <label for="">Email</label>
            <input type="email" name="email" id="">
          </div>
          <div>
            <label for="">Password</label>
            <input type="password" name="password" id="">
          </div>
          <div>
            <label for="">Role</label>
           <select name="role" id="role">
            <option value="admin">admin</option>
            <option value="user">user</option>
           </select>
          </div>
          <div>
            <input type="submit" value="Register">
          </div>
        </form>
    </div>
</body>
</body>
</html>
