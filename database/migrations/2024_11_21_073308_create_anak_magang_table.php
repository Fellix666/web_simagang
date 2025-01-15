<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('anak_magang')) {
            Schema::create('anak_magang', function (Blueprint $table) {
                $table->integer('id_magang')->autoIncrement();
                $table->integer('id_institusi');
                $table->integer('id_berkas');
                $table->integer('id_divisi');
                $table->string('nomor_induk', 15);
                $table->string('nama_lengkap', 50);
                $table->enum('jenis_kelamin', ['l', 'p']);
                $table->string('jurusan', 50);
                $table->date('tanggal_mulai');
                $table->date('tanggal_selesai');
                $table->enum('status', ['mahasiswa', 'siswa']);
                $table->timestamps();
                $table->foreign('id_institusi')->references('id_institusi')->on('institusi')->onDelete('cascade');
                $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('cascade');
                $table->foreign('id_berkas')->references('id_berkas')->on('berkas')->onDelete('cascade');
            });
        }
    }
    public function down()
    {
        Schema::dropIfExists('anak_magang');
    }
};
