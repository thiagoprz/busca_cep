<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cep', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro', 250);
            $table->string('bairro', 250);
            $table->string('cep', 8);
            $table->string('tipo_logradouro', 150);
            $table->integer('cidade_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cep');
    }
}
