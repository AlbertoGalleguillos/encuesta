<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alternative_id')->unsigned();
            $table->integer('code_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('user_type', ['Faceboook', 'Google', 'Webclass'])->default('Webclass');
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
        Schema::dropIfExists('answers');
    }
}
