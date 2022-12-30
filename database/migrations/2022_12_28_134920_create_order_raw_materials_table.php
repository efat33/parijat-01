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
        Schema::create('order_raw_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->index();
            $table->bigInteger('raw_material_id');
            $table->integer('quantity_aj');
            $table->integer('price');
            $table->timestamps();
            $table->unique(['order_id', 'raw_material_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_raw_materials');
    }
};
