<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use TCG\Voyager\Models\Page;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('owner');
            $table->string('code');
            $table->integer('qty')->default(0);
            $table->string('value', 30)->default(0);
            $table->string('income', 30)->default(0);
            $table->string('status', 30)->default('DRAFT');
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
        Schema::drop('trades');
    }
}
