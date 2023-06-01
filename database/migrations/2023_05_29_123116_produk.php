<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idtoko');
            $table->string('namaproduk');
            $table->string('size');
            $table->text('detail');
            $table->string('foto');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
