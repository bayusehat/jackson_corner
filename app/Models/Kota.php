<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Toko;
use App\Models\Peserta;

class Kota extends Model
{
    use HasFactory, SoftDeletes;

    public function toko()
    {
        return $this->hasMany(Toko::class,'id_kota','id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class,'id_kota','id');
    }

}
