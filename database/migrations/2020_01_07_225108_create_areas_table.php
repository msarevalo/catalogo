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
            $table->string('sigla')->unique();
            $table->integer('estado')->default('1');
            $table->timestamps();
        });

        DB::table('areas')->insert(array('nombreArea'=>'Gerencia General', 'sigla'=>'GG'));
        DB::table('areas')->insert(array('nombreArea'=>'Gerencia Comercial', 'sigla'=>'GC'));
        DB::table('areas')->insert(array('nombreArea'=>'Financiera', 'sigla'=>'F'));
        DB::table('areas')->insert(array('nombreArea'=>'Cuentas', 'sigla'=>'C'));
        DB::table('areas')->insert(array('nombreArea'=>'Operaciones', 'sigla'=>'O'));
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
