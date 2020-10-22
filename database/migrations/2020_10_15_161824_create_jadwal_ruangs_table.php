<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ruang', function (Blueprint $table) {
            $table->id();
            $table->integer('ruang_id');
            $table->integer('mapel_id');
            $table->integer('jam_ke');
            // $table->foreign('ruang_id')->references('id')->on('ruang')->onDelete('cascade');
            // $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->timestamps();
        });

        // $table->foreign('ruang_id')->references('id')->on('ruang');
        // $table->foreign('mapel_id')->references('id')->on('mapel');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_ruang');
    }
}
