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
            $table->string('nisn')->unique();
            $table->bigInteger('nis')->unique()->nullable();
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('tingkat');
            $table->integer('rombel_id')->nullable();
            $table->integer('ekskul_id')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('asal_sekolah');
            $table->integer('tahun_lulus');
            $table->date('diterima_tanggal');
            $table->string('diterima_dikelas');
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->integer('kode_pos');
            $table->string('phone');
            $table->string('status_anak');
            $table->integer('anak_ke');
            $table->integer('is_graduated')->default(0);
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
