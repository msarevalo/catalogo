<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArea');
            $table->integer('estado')->default('1');
            $table->timestamps();
        });

        DB::table('areas')->insert(array('nombreArea'=>'Gerencia General'));
        DB::table('areas')->insert(array('nombreArea'=>'Gerencia Comercial'));
        DB::table('areas')->insert(array('nombreArea'=>'Financiera'));
        DB::table('areas')->insert(array('nombreArea'=>'Cuentas'));
        DB::table('areas')->insert(array('nombreArea'=>'Operaciones'));
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
