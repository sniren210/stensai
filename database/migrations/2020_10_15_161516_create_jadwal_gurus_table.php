<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_guru', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->integer('mapel_id');
            $table->integer('jam_ke');
            // $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
            // $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->timestamps();
        });

        // $table->foreign('guru_id')->references('id')->on('guru');
        // $table->foreign('mapel_id')->references('id')->on('mapel');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_guru');
    }
}
