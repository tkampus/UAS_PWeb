<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->integer('idtoko');
            $table->string('namatoko')->unique();
            $table->string('alamat');
            $table->string('tokopedia');
            $table->string('notoko');
            $table->string('namapemilik');
            $table->string('nopemilik');
            $table->text('detailtoko');
            $table->string('fotoprovil');
            $table->string('fotobg');
            $table->string('shope');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokos');
        $folderPath = 'public\file'; // Ganti dengan path yang sesuai
        Storage::deleteDirectory($folderPath);
    }
};
