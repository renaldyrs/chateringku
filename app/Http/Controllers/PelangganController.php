<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $produk = produk::get();
        return view('welcome', ['produk'=>$produk]);
    }
    public function add( Request $request)
    {
        // add the product to cart
        // \Cart::session(auth()->id())->add(array(
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'price' => $product->price,
        //     'quantity' => 1,
        //     'attributes' => array(),
        //     'associatedModel' => $product
        // ));



        // return redirect()->route('cart.index');
        
        $this->validate($request, [
            'product_id' => 'required|exists:produks,id_produk', //PASTIKAN PRODUCT_IDNYA ADA DI DB
            // 'qty' => 'required|integer' //PASTIKAN QTY YANG DIKIRIM INTEGER
        ]);
        $carts = json_decode($request->cookie('dw-carts'), true); 
        if ($carts && array_key_exists($request->product_id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$request->product_id]['qty'] += 1;
            echo "halo";
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            $product = produk::find($request->product_id);
            // dd($product);
            // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            $carts[$request->product_id] = [
                'qty' => 1,
                'product_id' => $product->id,
                'product_name' => $product->nama,
                'product_price' => $product->harga,
                'product_image' => $product->file,
                'keterangan' => $product->keterangan
            ];
            echo "a";
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        // Cookie::queue($cookie);
        return redirect()->back()->cookie($cookie);     
        
        // // echo
        
        // $cookie = Cookie::make('name', 'value', 120);
            // $response = new Response('aku');
            // $response->withCookie(cookie())
    }
    public function keranjang(Request $request)
    {

        $cartItems = json_decode($request->cookie('dw-carts'), true); 
        $subtotal = collect($cartItems)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });


       
    // // unset($cartItems[2]);
    // // // dd($cartItems);
    
        return view('keranjang', compact('cartItems','subtotal'));
    }
}
