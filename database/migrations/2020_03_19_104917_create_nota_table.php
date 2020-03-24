<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) 
        {
            $table->increments('idNot');
            $table->unsignedInteger('idTab') ;
            $table->text('texto') ;
            $table->timestamp('fecha') ;
            $table->boolean('completado')->default(false) ;
        });

        Schema::table('nota', function(Blueprint $table)
        {
            $table->foreign('idTab')
                  ->references('idTab')
                  ->on('tablero')
                  ->onDelete('cascade') ;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
