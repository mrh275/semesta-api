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
        Schema::create('daftar_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn');
            $table->integer('kelas_id');
            $table->integer('peraturan_id');
            $table->integer('poin');
            $table->enum('is_negative', [0, 1])->default(1);
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
        Schema::dropIfExists('daftar_pelanggarans');
    }
};
