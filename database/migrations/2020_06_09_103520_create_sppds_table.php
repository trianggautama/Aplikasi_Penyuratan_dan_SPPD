<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('anggaran_id');
            $table->string('tempat', 100);
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kepulangan');
            $table->string('maksud_tujuan', 100);
            $table->string('jumlah')->nullable();
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('anggaran_id')->references('id')->on('anggarans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppds');
    }
}
