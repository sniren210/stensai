<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id');
            $table->integer('mapel_id');
            $table->integer('jam_ke');
            // $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            // $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->timestamps();
        });

        // $table->foreign('kelas_id')->references('id')->on('kelas');
        // $table->foreign('mapel_id')->references('id')->on('mapel');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kelas');
    }
}
