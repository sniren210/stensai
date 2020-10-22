<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nilai');
            $table->integer('siswa_id');
            $table->integer('mapel_id');
            // $table->foreign('siswa_id')->references('id')->on('siswa');
            // $table->foreign('mapel_id')->references('id')->on('mapel');
            $table->timestamps();
        });

        // $table->foreign('siswa_id')->references('id')->on('siswa');
        // $table->foreign('mapel_id')->references('id')->on('mapel');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_siswa');
    }
}
