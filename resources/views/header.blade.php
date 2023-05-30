
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,700&display=swap');
        .span1{
        display: flex;
        gap: 15px
    }
    .span1{
        display: flex;
        justify-content: center;
        align-items:center;
    }
    .span1 a{
        display: flex;
        justify-content: center;
        align-items: center;
         text-decoration: none;
         /* border: 2.5px solid #FFE194; */
         backdrop-filter: blur(20px);
         color: #E8F6EF;
         padding: 5px;
         width: 140px;
         height: 40px;
         font-weight: 600;
         border-radius: 6px;
         transition: 0.6s;
   }
   .span1 a:hover{
    background: #FFE194;
    transition: 0.6s;
    color: #4C4C6D;
}

   .span1 h1 img{
    width: 45px;
    height: 45px;
   }
   .span2 h2{
    color : #E8F6EF;
    font-size: 20px;
   }
     .menu{
      display: flex;
      align-items: center
        gap:10px;
        justify-content:space-between;
        padding: 0 30px;
        font-family: 'Roboto', sans-serif;
        margin:12px 25px;

     }
     .menu span{
        display: flex;
        justify-content: center;
        align-items: center;
     }
     .menu .span2 button[type="submit"]{
        background: transparent;
        border: none;
        width: 42px;
        height: 42px;
    }
    .menu .span2 button[type="submit"]{ cursor: pointer;}

</style>

<header class="menu">
  <span class="span1">
    <h1><img src="{{asset('img/bx-store-alt.svg')}}" alt="" srcset=""></h1>
    @if (Auth::user()->role == 'admin')
    <a href="http://localhost/auth/auth-laravel/public/dashborad">Ir a Usuarios</a>
    @endif
    <a href="{{route('cart')}}">Carrito</a>
  </span>
  <span class="span2" style="display: flex ; gap:10px">
    <h2>Bienvenido  {{ Auth::user()->name }}</h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"><img src="{{asset('img/bx-power-off (1).svg')}}" alt="" srcset=""></button>
    </form>
  </span>

</header>





