<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->string('kode_biaya', 50);
            $table->text('uraian');
            $table->unsignedBigInteger('golongan_id');
            $table->string('besar_pagu', 50);
            $table->string('jenis_sppd', 50);
            $table->timestamps();
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
