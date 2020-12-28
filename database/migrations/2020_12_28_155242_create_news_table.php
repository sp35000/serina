<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('pk_news');
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('link')->nullable();
            $table->decimal('initial_date', 11)->nullable()->default(0.00);
            $table->decimal('final_date', 11)->nullable()->default(0.00);
            $table->string('hashtag')->nullable();
            $table->string('media')->nullable();
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
        Schema::dropIfExists('news');
    }
}
