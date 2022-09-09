<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezultataisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezultatais', function (Blueprint $table) {
            $table->increments( 'id');
            $table->integer('users_id');
            $table->dateTime('testas_pradzia');
            $table->dateTime('testas_pabaiga');
            $table->double('testas_pazangumas',5,1);
            $table->integer('testas_teisingi');
            $table->integer('testas_klaidingi');
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
        Schema::dropIfExists('rezultatais');
    }
}
