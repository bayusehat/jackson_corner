<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kota;
use App\Models\Peserta;


class Toko extends Model
{
    use HasFactory, SoftDeletes;

    public function kota()
    {
        return $this->belongsTo(Kota::class,'id_kota','id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class,'id_toko','id');
    }
}
