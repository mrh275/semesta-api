<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKesejahteraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kesejahteraans', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->string('kip');
            $table->string('kis');
            $table->string('kks');
            $table->string('kps');
            $table->string('pkh');
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
        Schema::dropIfExists('data_kesejahteraans');
    }
}
