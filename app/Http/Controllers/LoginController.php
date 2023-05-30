<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\CartProduct;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function login(){
    return view('login');
}

   public function home(Request $request){

    $value = $request->filtrar;

    $users = User::all();
    $products = DB::select('SELECT * FROM `products` WHERE name LIKE ?', ['%' . $value]);
    $cartProduct  = CartProduct::all();


    return view('home', [
        'users' => $users,
        'products' => $products,

    ]);
}

// public function filtrar(Request $request){
//

// }


public function register(){
    return view('register');
}

public function dashborad(){
     $users = User::simplePaginate(6);

    return view('users' , [
        'users' => $users
    ]);
}
public function product(){
    return view('product');
}

public function comentar( Request $request ){

     $idName  =(int)$request->input('idName');
     $comment = $request->input('comment');

     $comments_user = Comment::where('user_id', '=',$idName)->get();
     $user = User::find($idName);

      if ($comments_user) {
         $new = Comment::create([
            'user_id' => (int)$request->input('idName'),
           'coments' => $request->input('comment')
         ]);
      }

     return view('home',['comments_user' => $comments_user]);
}

public function auth(Request $request){
        $credentias = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         $remember = (request()->filled('remember'));


        if(Auth::attempt($credentias , $remember))
        {
            request()->session()->regenerate();
            return redirect('/home')->with('status' ,'Estas logeado');
        }

        return redirect('/login');


     }

     public function registerUser(Request $request){

        $user = User::create([
           'name'=> $request->name,
           'email'=> $request->email,
           'password'=> Hash::make($request->password),
           'role'=> $request->role
        ]);

        return redirect()->route('dashborad')->with('msg','Usuario Registrado');

     }

     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect('/login')->with('status','Haz cerrado sesion');
     }

     public function addRole(Request $request){
        $id = $request->input('IdRole');
        $role = $request->input('role');

        $user = User::where('id', '=', $id)->first();

        if ($user->role || $user->role == NULL) {
            $user->role = $role;
            $user->save();
        }
         return redirect()->route('dashborad');
     }

     public function editUser(Request $request){
        $id = $request->id_edit;
        $user = User::where('id',$id)->get();

          return view('edit',['user'=>$user]);
     }
     public function updateUser(Request $request){
        $id = $request->id_edit;
        $user_update = User::where('id',$id)
        ->update([
            'name'=>$request->name,
            'email' =>$request->email,
            'role'=>$request->role
        ]);
        return redirect()->route('dashborad')->with('status','Usuario Actualizado');
     }

     public function deleteUser(Request $request){
        $id = $request->id_delete;
        $user_delete = User::find($id)->delete();

        return redirect()->route('dashborad')->with('status','Usuario con el id : '.$id.' ha sido eliminado');
     }




}

