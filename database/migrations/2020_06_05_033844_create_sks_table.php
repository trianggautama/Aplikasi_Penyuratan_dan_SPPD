<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sks', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('jenis_surat_id')->onDelete('cascade');
            $table->foreignId('agenda_id')->onDelete('cascade');
            $table->string('nomor_register', 50);
            $table->date('tanggal_register');
            $table->string('pemohon', 50);
            $table->string('identitas', 50);
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
        Schema::dropIfExists('sks');
    }
}
