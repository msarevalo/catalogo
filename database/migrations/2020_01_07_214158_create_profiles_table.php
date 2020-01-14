<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrePerfil');
            $table->integer('estado')->default('1');
            $table->timestamps();
        });

        DB::table('profiles')->insert(array('nombrePerfil'=>'superadmin'));
        DB::table('profiles')->insert(array('nombrePerfil'=>'admin'));
        DB::table('profiles')->insert(array('nombrePerfil'=>'usuario web'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
