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
            $table->foreignId('kategori_id')->onDelete('cascade');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kepulangan');
            $table->string('maksud_tujuan', 100);
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
        Schema::dropIfExists('sppds');
    }
}
