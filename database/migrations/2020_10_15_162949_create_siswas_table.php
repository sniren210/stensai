<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('nis');
            $table->integer('nisn');
            $table->string('jk');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->integer('anak_ke');
            $table->string('foto')->default('siswa-default.png');
            $table->string('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->integer('kelas_id');
            $table->timestamps();

            // $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
