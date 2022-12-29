<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('rombel_type');
            $table->integer('kurikulum_type');
            $table->integer('kurikulum_rombel');
            $table->string('nama_kelas');
            $table->integer('tingkat');
            $table->integer('jurusan')->nullable();
            $table->integer('wali_kelas_id');
            $table->integer('jumlah_siswa');
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
        Schema::dropIfExists('kelas');
    }
}
