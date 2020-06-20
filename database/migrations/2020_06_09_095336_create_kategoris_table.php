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
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('transportasi_id');
            $table->string('besar_pagu', 50);
            $table->timestamps();
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
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
        Schema::dropIfExists('kategoris');
    }
}
