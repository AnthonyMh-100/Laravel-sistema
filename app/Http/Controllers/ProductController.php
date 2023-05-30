<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\ventaPdf;
use NumberFormatter;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function cart(){
        $cartProducts = session('cart', []);
        return view('cart',compact('cartProducts'));
    }
    public function viewProducts(){
        $products = Product::simplePaginate(6);

        return view('products',[
            'products' => $products

        ]);
    }
    public function ventasPdf(){
        return view('ventaPdf');
    }
    public function userVentasPdf(){
         $ventasPdf = ventaPdf::all();
        return view('ventasUserPdf',['ventasPdf'=>$ventasPdf]);
    }

    public function editProduct(Request $request){
           $id = $request->id_edit;
           $product = Product::where('id_product',$id)->get();
           return view('editProduct',['product'=> $product]);
    }
    public function updateProduct(Request $request){

        $id = $request->id;
        if($request->hasfile('img')){
            $file = $request->file('img');
            $destino = 'img/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uploadsuccess = $request->file('img')->move($destino,$fileName);

        $product = Product::where('id_product',$id)->update([
            'name'=> $request->name,
            'descripcion'=> $request->descripcion,
            'precio'=> $request->price,
            'stock'=> $request->stock,
            'img'=> $destino.$fileName,
        ]);
   }
    return redirect()->route('viewProducts');
    }

    public function deleteProduct(Request $request){

         $id = $request->id_delete;
         $productDelete = Product::where('id_product',$id)->delete();
        return redirect()->route('viewProducts')->with('statusDelete','Producto con id '.$id.' eliminado');
    }

    public function add_product(Request $request){

         if($request->hasfile('img')){
              $file = $request->file('img');
              $destino = 'img/';
              $fileName = time().'-'.$file->getClientOriginalName();
              $uploadsuccess = $request->file('img')->move($destino,$fileName);


        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'stock' => 'required|integer'
        ]);
         $product = Product::create([
            'name'=> $request->name,
            'descripcion' => $request->description,
            'precio' =>  $request->price,
            'stock' => $request->stock,
            'img' => $destino.$fileName,

         ]);
        }

         return redirect()->route('home')->with('msg','Producto Insertado');
    }

    public function addCart(Request $request){

        $id_product = $request->id_product;
        $id_user = $request->id_user;

        $product = Product::where("id_product",$id_product)->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id_product])) {
            $cart[$product->id_product]['quantity']++;
        }else{
            $cart[$product->id_product] = [
                'id_user'=> $id_user,
                'id' => $product->id_product,
                'name' => $product->name,
                'price' => $product->precio,
                'quantity' =>  $request->quantity,
                'total'=>($product->precio * $request->quantity)
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('home')->with('status','Producto Agregado');
    }

    public function deleteProductCart(Request $request){

        $cart = session()->get('cart', []);
        $id = (int)$request->input("id");

        // Buscar y eliminar el elemento del carrito por su ID
        foreach ($cart as $index => $item) {

            if ($item['id'] === $id) {
                unset($cart[$index]);
                break;
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }
    public function generateSale(Request $request){

          $cart = session()->get('cart');

          foreach ($cart as $item) {

            $cartProduct = CartProduct::create([
                'id_user' => $item["id_user"],
                'id_product'=> $item["id"],
                'name' => $item["name"],
                'price' => $item["price"],
                'quantity' => $item["quantity"],
                'total'=>$item["total"],
              ]);
          }

          return redirect()->route('cart')->with('msg','Venta Generada');
    }

    public function generatePdf(){
        $carrito = session()->get('cart');
        $currentDateTime = Carbon::now('America/Lima')->format('Y-m-d H:i:s');
       // session()->forget('cart');
        $pdf = PDF::loadView('pdf', ['carrito' => $carrito, 'currentDateTime' => $currentDateTime]);
        return $pdf->download('__venta.pdf');


     //return view('pdf',compact('carrito','currentDateTime'));
    }
   public function userPdf(Request $request){
     $file = $request->hasFile('pdf');
     $time = Carbon::now('America/Lima')->format('Y-m-d H:i:s');
      $name = $request->file('pdf');

        if ($file) {
            $name = $request->file('pdf')->getClientOriginalName();
            $path = 'pdfs/';
            $full_name = time()."-".$name;
            $full_path =$path.$full_name;
            $uploadsuccess = $request->file('pdf')->move($path,$full_name);

            $ventaPDf = ventaPdf::create([
                'id_user'=>$request->user,
                'name'=>$request->name,
                'ventaPdf' => $full_path,
                'times' => $time
            ]);
        }

        return redirect()->route('userVentasPdf');
   }


}
