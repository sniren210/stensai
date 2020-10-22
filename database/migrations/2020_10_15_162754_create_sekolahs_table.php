<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('nss');
            $table->integer('npsn');
            $table->string('prov');
            $table->string('kab');
            $table->string('kec');
            $table->string('desa');
            $table->string('jln');
            $table->integer('kd_pos');
            $table->char('akreditas');
            $table->date('th_akreditas');
            $table->date('th_berdiri');
            $table->string('foto');
            $table->integer('guru_id');
            $table->timestamps();

            // $table->foreign('guru_id')->references('id')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
