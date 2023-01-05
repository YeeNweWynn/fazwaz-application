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
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('for_sale')->default(0);
            $table->boolean('for_rent')->default(0);
            $table->boolean('sold')->default(0);
            $table->integer('price');
            $table->string('currency', 10);
            $table->string('currency_symbol', 50);
            $table->string('property_type', 50);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->double('area');
            $table->string('area_type', 10);
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
        Schema::dropIfExists('properties');
    }
};
