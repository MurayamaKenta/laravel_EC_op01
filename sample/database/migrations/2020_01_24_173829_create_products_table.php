<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->string('comment');
            $table->integer('price');
            $table->string('pic1')->nullable();
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->boolean('delete_flg')->nullable();
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
        Schema::dropIfExists('products');
    }
}
