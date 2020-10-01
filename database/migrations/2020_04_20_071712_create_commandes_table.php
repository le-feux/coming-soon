<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref');
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('frais_port', 8, 2)->nullable();
            $table->string('code_promo')->default(0);
            $table->integer('remise')->default(0);
            $table->string('etat');
            $table->string('valider')->default(0);
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->foreign('clients_id')->references('id')->on('clients');
            $table->bigInteger('paniers_id')->unsigned()->index();
            $table->foreign('paniers_id')->references('id')->on('paniers');
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
        Schema::dropIfExists('commandes');
    }
}
