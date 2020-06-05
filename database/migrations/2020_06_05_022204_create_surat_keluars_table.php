<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('agenda_id')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->onDelete('cascade');
            $table->string('nomor_surat', 50);
            $table->date('tanggal_kirim');
            $table->string('tujuan', 50);
            $table->text('isi');
            $table->string('file', 50)->nullable();
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
        Schema::dropIfExists('surat_keluars');
    }
}
