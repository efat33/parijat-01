<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_chawkbazar_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->index();
            $table->string('item_name');
            $table->integer('quantity_aj');
            $table->integer('price');
            $table->integer('serial');
            $table->unique(['order_id', 'serial']);
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
        Schema::dropIfExists('order_chawkbazar_items');
    }
};
