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
        Schema::create('factory_order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('factory_order_id')->index();
            $table->bigInteger('item_id');
            $table->json('sub_quantity');
            $table->integer('total_quantity');
            $table->timestamps();
            $table->unique(['factory_order_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factory_order_items');
    }
};
