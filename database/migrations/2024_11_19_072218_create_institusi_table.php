<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('institusi', function (Blueprint $table) {
            $table->integer('id_institusi')->autoIncrement();
            $table->string('nama_institusi', 50);
            $table->string('alamat', 100);
            $table->string('website', 100);
            $table->string('email', 100);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('institusi');
    }
};
