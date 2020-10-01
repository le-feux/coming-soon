<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('commemtaire');
            $table->string('note')->nullable();
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->foreign('clients_id')->references('id')->on('clients');
            $table->bigInteger('blogs_id')->unsigned()->index();
            $table->foreign('blogs_id')->references('id')->on('blogs');
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
        Schema::dropIfExists('commentaires_blogs');
    }
}
