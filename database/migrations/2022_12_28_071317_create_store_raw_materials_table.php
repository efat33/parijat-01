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
        Schema::create('store_raw_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id')->index();
            $table->bigInteger('raw_material_id');
            $table->integer('serial');
            $table->integer('section');
            $table->timestamps();
            $table->unique(['store_id', 'raw_material_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_raw_materials');
    }
};
