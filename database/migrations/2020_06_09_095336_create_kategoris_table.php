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
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->unsignedBigInteger('golongan_id')->nullable();
            $table->string('kategori', 50);
            $table->string('besar_pagu', 50);
            $table->string('jenis_sppd', 50)->nullable();
            $table->string('kelas', 50)->nullable();
            $table->timestamps();
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
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
