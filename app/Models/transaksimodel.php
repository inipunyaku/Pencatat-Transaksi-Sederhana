<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class transaksimodel extends Model
{
    public function tambahtransaksi($data){
        DB::table('transaksi')->insert($data);
    }
    public function showtransaksi(){
        return DB::table('transaksi')->orderBy('uidtransaksi', 'desc')->get();
    }
    public function showdetail($id){
        return DB::table('detail')->where('uidtransaksi',$id)->get();
    }
    public function tambahdetail($data2){
        DB::table('detail')->insert($data2);
    }


}
