<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use TCG\Voyager\Models\Page;

class CreateIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('category_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('country')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', Page::$statuses)->default(Page::STATUS_INACTIVE);
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
        Schema::drop('index');
    }
}
