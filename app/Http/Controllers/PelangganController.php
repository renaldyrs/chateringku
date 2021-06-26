<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\pesanan_item;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
                'product_id' => $product->id_produk,
                'product_name' => $product->nama_produk,
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
    public function checkout(Request $request){
        $cartItems = json_decode($request->cookie('dw-carts'), true); 
        $subtotal = collect($cartItems)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });
        $bank = bank::get();
        return view('checkout',compact('cartItems','subtotal','bank'));
    }


    public function change($id,$n,Request $request){
        // Cookie::queue($cookie);
        $carts = json_decode($request->cookie('dw-carts'), true); 
        if ($carts && array_key_exists($id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$id]['qty'] =$n;
            // echo "halo";
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            $product = produk::find($request->product_id);
            // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            $carts[$request->product_id] = [
                'qty' => 1,
                'product_id' => $product->id_produk,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
            echo "a";
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        Cookie::queue($cookie);
        
        // return redirect()->back()->cookie($cookie); 
        // return redirect()->back();
         
    }
    public function delete($id,Request $request){
        $carts = json_decode($request->cookie('dw-carts'), true); 
        unset($carts[$id]);
        if ($carts  ) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            // $carts[$request->product_id]['qty'] += 1;
            
            // echo "halo";
            
            $cookie = cookie('dw-carts', json_encode($carts), 2880);
            Cookie::queue($cookie);
            return redirect('keranjang');
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            // $product = barang::find($request->product_id);
            // // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            // $carts[$request->product_id] = [
            //     'qty' => 1,
            //     'product_id' => $product->id,
            //     'product_name' => $product->nama,
            //     'product_price' => $product->harga,
            //     'product_image' => $product->file,
            //     'keterangan' => $product->keterangan
            // ];
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            // echo "a";
            return redirect('keranjang');
        }
    }
    public function bayar(Request $request){
        $cek = Pelanggan::where('id_user',Auth::user()->id)->get();
        // echo $request->kodepos;
        if(count($cek)>0){
            $pela = Pelanggan::where('id_user',Auth::user()->id)->select('id_pelanggan')->get();
            $id=0;
            foreach($pela as $a){
                $id = $a->id_pelanggan;
            }
            echo "c";
            Pelanggan::where('id_pelanggan',$id)->update(
                    ['nama_pelanggan'=>$request->nama,
                    'kode_pos'=>$request->kodepos,
                    'no_hp'=>$request->hp,
                    'alamat'=>$request->alamat
                    ]
            );
        }else{
            Pelanggan::insert(
                ['nama_pelanggan'=>$request->nama,
                'kode_pos'=>$request->kodepos,
                'no_hp'=>$request->hp,
                'alamat'=>$request->alamat,
                'id_user'=>Auth::user()->id
                ]
        );


        }
        $pela = Pelanggan::where('id_user',Auth::user()->id)->select('id_pelanggan')->get();
        // dd($pela);
        // echo date('Y-m-d');
        $id=0;
        foreach($pela as $a){
            $id = $a->id_pelanggan;
        }
        echo "c";
        $cartItems = json_decode($request->cookie('dw-carts'), true);
        Pesanan::insert([
            'id_pelanggan'=>$id,
            'kode_pos'=>$request->kodepos,
            'alamat'=>$request->alamat,
            'tanggal_pesanan'=>date('Y-m-d H:i:s'),
            'status'=>'belum bayar',
        ]);
        $pesan = Pesanan::where('id_pelanggan',$id)->select('id_pesanan')->get();
        $id_pesan=0;
        foreach($pesan as $a){
            $id_pesan= $a->id_pesanan;
        }
        foreach($cartItems as $a){
            pesanan_item::insert([
                'id_produk'=>$a['product_id'],
                'id_pesanan'=>$id_pesan,
                'jumlah'=>$a['qty'],
                'harga'=>$a['product_price']
            ]);
        }
        $cookie = \Cookie::forget('dw-carts');
        Cookie::queue($cookie);
            
        return redirect('/pembayaran'); 
    }
}
