<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('code_postal');
            $table->string('rue');
            $table->string('ville');
            $table->string('region')->nullable();
            $table->string('etat')->nullable();
            $table->string('pays');
            $table->string('code_pays');
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->foreign('clients_id')->references('id')->on('clients');
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
        Schema::dropIfExists('adresses');
    }
}
