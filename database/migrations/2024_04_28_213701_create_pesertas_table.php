<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_toko');
            $table->string('nama_peserta');
            $table->date('tanggal_lahir');
            $table->tinyInteger('kategori_peserta');
            $table->string('nama_wali')->nullable();
            $table->string('nomor_handphone_wali')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
};
