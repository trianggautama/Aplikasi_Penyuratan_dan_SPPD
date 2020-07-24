<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembatalanRincianSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembatalan_rincian_sppds', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('sppd_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('rincian_sppd_id');
            $table->string('no_surat', 50);
            $table->string('alasan');
            $table->timestamps();
            $table->foreign('sppd_id')->references('id')->on('sppds')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->foreign('rincian_sppd_id')->references('id')->on('rincian_sppds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembatalan_rincian_sppds');
    }
}
