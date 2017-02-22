<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_tunjangan')->unique();
            $table->integer('jabatan_id')->unsigned();
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('golongan_id')->unsigned();
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('status');
            $table->integer('jumlah_anak')->nullable();
            $table->integer('besaran_uang');
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
        Schema::dropIfExists('tunjangans');
    }
}
