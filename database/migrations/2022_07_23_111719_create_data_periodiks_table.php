<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeriodiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_periodiks', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->string('hobi');
            $table->string('cita_cita');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->integer('jarak_rumah');
            $table->integer('waktu_tempuh');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
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
        Schema::dropIfExists('data_periodiks');
    }
}
