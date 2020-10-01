<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paniers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref');
            $table->bigInteger('client')->default(0);
            $table->string('image');
            $table->string('libelle');
            $table->decimal('quantite', 6, 2)->nullable();
            $table->decimal('prix', 8, 2)->nullable();
            $table->decimal('prix_ttc', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->string('code_promo')->default(0);
            $table->integer('remise')->default(0);
            $table->decimal('total_ttc', 8, 2)->nullable();
            $table->integer('valider')->default(0);
            $table->bigInteger('produits_id')->unsigned()->index();
            $table->foreign('produits_id')->references('id')->on('produits');
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
        Schema::dropIfExists('paniers');
    }
}
