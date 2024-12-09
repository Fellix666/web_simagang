<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('divisi', function (Blueprint $table) {
            $table->integer('id_divisi')->autoIncrement();
            $table->string('nama_divisi', 50);
            $table->string('kepala_divisi', 50);
            $table->string('pangkat', 50)->nullable(); // Allow NULL
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('divisi');
    }
};
