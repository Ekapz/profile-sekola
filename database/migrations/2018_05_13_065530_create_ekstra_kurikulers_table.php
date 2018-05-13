<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstraKurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstra_kurikulers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis');
            $table->string('nama');
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
        Schema::dropIfExists('ekstra_kurikulers');
    }
}
