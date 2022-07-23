<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_files', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->string('ijazah')->default('-');
            $table->string('kk')->default('-');
            $table->string('akte')->default('-');
            $table->string('ktp')->default('-');
            $table->string('kip')->default('-');
            $table->string('kis')->default('-');
            $table->string('kks')->default('-');
            $table->string('pkh')->default('-');
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
        Schema::dropIfExists('upload_files');
    }
}
