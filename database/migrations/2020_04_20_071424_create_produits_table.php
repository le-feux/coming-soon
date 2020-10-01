<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref');
            $table->string('libelle');
            $table->string('illustration');
            $table->decimal('quantite', 8, 2)->default(0);
            $table->decimal('prix', 8, 2);
            $table->decimal('prix_ttc', 8, 2)->default(0);
            $table->integer('remise')->default(0);
            $table->text('resume');
            $table->text('description')->nullable();
            $table->integer('etat')->default(1);
            $table->integer('activer')->default(1);
            $table->bigInteger('marques_id')->unsigned()->index();
            $table->foreign('marques_id')->references('id')->on('marques');
            $table->bigInteger('fournisseurs_id')->unsigned()->index();
            $table->foreign('fournisseurs_id')->references('id')->on('fournisseurs');
            $table->bigInteger('tags_id')->unsigned()->index();
            $table->foreign('tags_id')->references('id')->on('tags');
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
        Schema::dropIfExists('produits');
    }
}
