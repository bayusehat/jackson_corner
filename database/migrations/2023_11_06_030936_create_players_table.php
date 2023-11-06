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
        Schema::create('players', function (Blueprint $table) {
            $table->id('id_players');
            $table->string('nama_lengkap');
            $table->string('gender');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->string('username_instagram');
            $table->string('usia');
            $table->string('know_jackson_active');
            $table->string('know_jackson_from');
            $table->string('other_answer');
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
        Schema::dropIfExists('players');
    }
};
