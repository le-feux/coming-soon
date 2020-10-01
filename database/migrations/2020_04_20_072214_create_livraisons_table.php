<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('etat');
            $table->string('tracking_code')->nullable();
            $table->bigInteger('commandes_id')->unsigned()->index();
            $table->foreign('commandes_id')->references('id')->on('commandes');
            $table->bigInteger('adresses_id')->unsigned()->index();
            $table->foreign('adresses_id')->references('id')->on('adresses');
            $table->bigInteger('transporteurs_id')->unsigned()->index();
            $table->foreign('transporteurs_id')->references('id')->on('transporteurs');
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
        Schema::dropIfExists('livraisons');
    }
}
