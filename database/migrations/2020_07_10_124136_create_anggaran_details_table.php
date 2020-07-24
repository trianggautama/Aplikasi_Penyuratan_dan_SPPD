<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_details', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('harian_id')->nullable();
            $table->unsignedBigInteger('representasi_id')->nullable();
            $table->unsignedBigInteger('penginapan_id')->nullable();
            $table->unsignedBigInteger('tiket_id')->nullable();
            $table->unsignedBigInteger('taksi_id')->nullable();
            $table->unsignedBigInteger('rincian_sppd_id');
            $table->string('total_anggaran')->nullable();
            $table->string('catatan', 100);
            $table->foreign('harian_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('representasi_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('penginapan_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('tiket_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('taksi_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('rincian_sppd_id')->references('id')->on('rincian_sppds')->onDelete('cascade');
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
        Schema::dropIfExists('anggaran_details');
    }
}
