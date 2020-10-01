<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('hauteur', 6, 2)->nullable();
            $table->decimal('largeur', 6, 2)->nullable();
            $table->decimal('profondeur', 6, 2)->nullable();
            $table->decimal('poids', 6, 2)->nullable();
            $table->text('composition')->nullable();
            $table->text('styles')->nullable();
            $table->text('proprietes')->nullable();
            $table->decimal('contenances', 6, 2)->nullable();
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
        Schema::dropIfExists('caracteristiques');
    }
}
