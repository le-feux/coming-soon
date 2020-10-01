<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_promo');
            $table->decimal('montant', 8, 2)->nullable();
            $table->integer('payer')->default(0);
            $table->bigInteger('commandes_id')->unsigned()->index();
            $table->foreign('commandes_id')->references('id')->on('commandes');
            $table->bigInteger('affiliates_id')->unsigned()->index();
            $table->foreign('affiliates_id')->references('id')->on('affiliates');
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
        Schema::dropIfExists('commissions');
    }
}
