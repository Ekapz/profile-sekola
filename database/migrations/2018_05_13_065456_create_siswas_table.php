<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nisn')->unique();
            $table->integer('nis')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->integer('no_telp')->unique();
            $table->string('email');
            $table->unsignedInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
             $table->unsignedInteger('sekolah_id');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('siswas');
    }
}
