<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->integer('kelas_id');
            // $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
            // $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });

        // $table->foreign('kelas_id')->references('id')->on('kelas');
        // $table->foreign('guru_id')->references('id')->on('guru');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wali_kelas');
    }
}
