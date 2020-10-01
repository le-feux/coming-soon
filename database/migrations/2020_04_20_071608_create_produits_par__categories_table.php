<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsParCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits_par__categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('produits_id')->unsigned()->index();
            $table->foreign('produits_id')->references('id')->on('produits');
            $table->bigInteger('categories_id')->unsigned()->index();
            $table->foreign('categories_id')->references('id')->on('categories');
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
        Schema::dropIfExists('produits_par__categories');
    }
}
