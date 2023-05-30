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
    <h1>Guardar pdfs</h1>
    <form action="{{route('userPdf')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Id ususario</label>
            <input type="text" name="user" id="user">
        </div>
        <div>
            <label for="">name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <input type="file" name="pdf"><br>
        </div>
        <div>
            <input type="submit" value="Enivar"><br>
        </div>
    </form>
   </div>
</body>
</html>
