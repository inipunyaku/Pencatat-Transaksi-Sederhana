<?php

namespace App\Http\Controllers;

use App\Models\User;

Use App\Models\barangmodel;
use App\Models\transaksimodel;
use Illuminate\Http\Request;

class transaksicontroller extends Controller
{
    public function __construct()
    {
        $this->barangmodel = new barangmodel();
        $this->transaksimodel = new transaksimodel();
    
    }
    public function insertcart(){
      $id= request()->id;
      $jumlah = request()->jumlah;
      $data = $this->barangmodel->detailbarang($id)->first();
   
      $cart = session("cart");
      $cart[$id] = [
          'namabarang' =>$data->namabarang,
          'hargabarang' =>$data->hargabarang,
          'jumlahbarang' =>$jumlah
      ];
      session(['cart'=>$cart]);
      return redirect('/')->with('success','Item berhasil dimasukan ke keranjang buka tab keranjang untuk checkout');
    }
    function cart(){
        $cart = session ("cart");
        return view("cart")->with("cart",$cart);
    }
    function inputtransaksi(){
        $unikid=uniqid();
       $data=[
           'uidtransaksi'=>$unikid,
           'namapembeli'=>request()->nama,
           'tanggalpembelian'=>request()->tgl,
           'totalsebelumdiskon'=>request()->totalsebelumdiskon,
           'totalharga'=>request()->totalharga,
           'diskon'=>request()->diskon
       ];
       
    
       $this->transaksimodel->tambahtransaksi($data);

       $cart = session("cart");

        foreach($cart as $ct => $val){
            $uidbarang=$ct;
            $ambil  = $this->barangmodel->detailbarang($uidbarang)->first();
            $quantity=$val['jumlahbarang'];
            $data2=[
                'uidtransaksi' => $unikid,
                'uidbarang' => $uidbarang,
                'jumlahbeli' => $quantity,
                'namabarang' => $ambil->namabarang,
                'hargabarang' => $ambil->hargabarang
            ];
        $this->transaksimodel->tambahdetail($data2);
        } 
        session()->forget('cart');
      return redirect()->route('index')->with('success','Pembelian Berhasil!');
    }
    function forgetcart(){
        session()->forget('cart');
        return redirect()->route('index')->with('info','Semua Keranjang Sudah dihapus');
    }
    function hapuscart($ID_MENU){
        $cart = session("cart");
        unset($cart[$ID_MENU]);
        session(["cart" => $cart]);
         return redirect("/cart")->with('info','1 Item Berhasil dihapus');

    }
    function showtransaksi(){
        $data=['ambil'=>$this->transaksimodel->showtransaksi()];

        return view('transaksi',$data);
    }
    function showdetail($id){
        $data=['ambil'=>$this->transaksimodel->showdetail($id)];
        $data2=['ambil2'=>$this->transaksimodel->showtransaksi()->where('uidtransaksi',$id)->first()];

        return view('detail',[
            'detail' =>$data,
            'transaksi' => $data2
        ]);
        return dd($data2);
    }
}
