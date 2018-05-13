<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nss')->unique();
            $table->string('nama')->unique();
            $table->text('alamat');
            $table->unsignedInteger('desa_id');
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('rw');
            $table->integer('rt');
            $table->integer('no_telp')->unique();
            $table->integer('no_fax')->unique();
            $table->string('image');
            $table->string('email')->unique();
            $table->string('website')->unique();
            $table->string('kepala_sekolah');
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
        Schema::dropIfExists('sekolahs');
    }
}
