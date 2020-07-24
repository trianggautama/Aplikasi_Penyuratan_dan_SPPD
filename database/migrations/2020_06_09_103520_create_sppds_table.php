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
            $table->unsignedBigInteger('berangkat_id');
            $table->unsignedBigInteger('tujuan_id');
            $table->unsignedBigInteger('transportasi_id');
            $table->string('no_surat_tugas', 100);
            $table->string('no_nota_dinas', 100);
            $table->string('tempat', 100);
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kepulangan');
            $table->string('maksud_tujuan', 100);
            $table->string('jumlah')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('berangkat_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->foreign('tujuan_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->foreign('transportasi_id')->references('id')->on('transportasis')->onDelete('cascade');

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
