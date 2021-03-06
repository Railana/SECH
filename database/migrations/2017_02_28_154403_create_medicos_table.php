<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusuario')->unsigned();
            $table->integer('idespecialidade')->unsigned();
            $table->string('crm',10); //min 4 caracteres, max 10 
            $table->binary('assinatura');            
            $table->foreign('idusuario')->references('id')-> on('users');
            $table->foreign('idespecialidade')->references('id')-> on('especialidades');            
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
        Schema::drop('medicos');
    }
}
