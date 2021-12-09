<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_t', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelamar_id');
            $table->foreign('pelamar_id')->references('id')->on('pelamar');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('bobot_kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriteria_m');
            $table->foreign('bobot_kriteria_id')->references('id')->on('bobot_kriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_t');
    }
}
