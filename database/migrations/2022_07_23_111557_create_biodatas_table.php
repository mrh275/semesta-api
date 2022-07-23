<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->integer('jalur_pendaftaran');
            $table->bigInteger('nisn')->unique();
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->integer('tahun_lulus');
            $table->string('kelas');
            $table->string('alamat');
            $table->string('dusun');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->integer('kode_pos');
            $table->integer('is_verified')->default(0);
            $table->integer('is_accepted')->default(0);
            $table->integer('is_graduated')->default(0);
            $table->integer('kelas_id')->nullable();
            $table->integer('tahun_lulus_id')->nullable();
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
        Schema::dropIfExists('biodatas');
    }
}
