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
            $table->integer('id_magang');
            $table->string('nama_berkas', 50);
            $table->string('jenis_berkas', 50);
            $table->string('file_path')->nullable();
            $table->timestamps();

            // Definisi foreign key: id_magang mengacu pada id_magang di tabel anak_magang
            $table->foreign('id_magang')
                ->references('id_magang')
                ->on('anak_magang')
                ->onDelete('cascade');
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
