<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Toko;
use App\Models\Peserta;

class Regional extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'regionals';

    public function toko()
    {
        return $this->hasMany(Toko::class,'id_regional','id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class,'id_kota','id');
    }
}
