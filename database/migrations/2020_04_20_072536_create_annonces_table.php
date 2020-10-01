<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('titre')->nullable();
            $table->string('sous_titre')->nullable();
            $table->string('tag')->nullable();
            $table->string('illustration');
            $table->date('duree')->nullable();
            $table->string('lien')->nullable();
            $table->string('url');
            $table->decimal('prix', 8, 2)->nullable();
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
        Schema::dropIfExists('annonces');
    }
}
