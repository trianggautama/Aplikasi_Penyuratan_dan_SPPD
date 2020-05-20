<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('golongan_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->string('nama', 50);
            $table->string('NIP', 25);
            $table->string('bidang', 50);
            $table->timestamps();
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('restrict');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('restrict');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
