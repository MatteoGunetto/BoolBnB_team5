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
        Schema::create('apartment_amenity', function (Blueprint $table) {
            //$table->id();

            $table->unsignedBigInteger('apartment_id');
            $table->unsignedBigInteger('amenity_id');

            //Definizione foreign keys
            $table->foreign('apartment_id')->references('id')->on('amenities');
            $table->foreign('amenity_id')->references('id')->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('apartment_amenity');
    }
};
