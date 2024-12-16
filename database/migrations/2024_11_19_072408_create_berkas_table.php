<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pastikan tabel 'anak_magang' sudah ada sebelum membuat tabel 'berkas'
        Schema::create('berkas', function (Blueprint $table) {
            $table->integer('id_berkas')->autoIncrement();
            $table->string('nama_berkas', 100);
            $table->string('asal_berkas', 50);
            $table->string(column:'nomor_berkas', length:50);
            $table->date('tanggal_berkas');
            $table->string('file_path')->nullable();
            $table->timestamps();

            // Definisi foreign key: id_magang mengacu pada id_magang di tabel anak_magang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};
