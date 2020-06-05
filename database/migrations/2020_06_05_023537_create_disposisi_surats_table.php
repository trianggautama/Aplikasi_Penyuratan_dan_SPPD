<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_surats', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('surat_masuk_id')->onDelete('restrict');
            $table->foreignId('pegawai_id')->onDelete('restrict');
            $table->string('sifat', 50);
            $table->date('batas_waktu');
            $table->string('isi');
            $table->text('catatan');
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
        Schema::dropIfExists('disposisi_surats');
    }
}
