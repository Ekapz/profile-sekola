<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('theme');
            $table->timestamps();
        });

        DB::table('themes')->insert(
            array(
                'title' => 'Merah',
                'theme' => 'red'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Ungu',
                'theme' => 'purple'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Nila',
                'theme' => 'indigo'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Biru',
                'theme' => 'blue'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Cyan',
                'theme' => 'cyan'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Teal',
                'theme' => 'teal'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Hijau',
                'theme' => 'green'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Kapur',
                'theme' => 'lime'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Kuning',
                'theme' => 'yellow'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Sawo Kuning',
                'theme' => 'amber'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Jingga',
                'theme' => 'orange'
            )
        );
        DB::table('themes')->insert(
            array(
                'title' => 'Coklat',
                'theme' => 'brown'
            )
        );    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
