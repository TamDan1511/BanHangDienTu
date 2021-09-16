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
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('quantities');
            $table->integer('discount')->nullable();
            $table->string('picture');
            $table->tinyInteger('status');
            $table->timestamp('time_discount')->nullable();
            $table->text('description')->nullable();
            $table->json('options')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained('categories');
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
