<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('id_admin')->autoIncrement();
            $table->string('username', 50);
            $table->string('password', 255);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
