<?php

namespace App\Models;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Toko;
use App\Models\Regional;

class Peserta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesertas';

    public function kota()
    {
        return $this->belongsTo(Kota::class,'id_kota','id');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class,'id_toko','id');
    }

    public function regional()
    {
        return $this->belongsTo(Regional::class,'id_kota','id');
    }
}
