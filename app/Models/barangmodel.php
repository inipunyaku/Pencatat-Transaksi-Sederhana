<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class barangmodel extends Model
{
    public function showbarang(){
        return DB::table('barang')->get();
    }
    public function detailbarang($uidbarang){
        return DB::table('barang')->where('uidbarang',$uidbarang);
    }
}
