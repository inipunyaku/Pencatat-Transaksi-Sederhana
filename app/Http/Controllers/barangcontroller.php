<?php

namespace App\Http\Controllers;

use App\Models\barangmodel;
use Illuminate\Http\Request;
class barangcontroller extends Controller
{
    public function __construct()
    {
        $this->barangmodel = new barangmodel();
    }
    public function index(){
        $data = ['ambil' => $this->barangmodel->showbarang()];
        return view('barang', $data);
    }
    //
}
