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
        Schema::create('amenity_apartment', function (Blueprint $table) {
            $table->id();

            $table->text('description')->nullable();

            $table->unsignedBigInteger('amenity_id');
            $table->unsignedBigInteger('apartment_id');

            //Definizione foreign keys
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('amenity_id')->references('id')->on('amenities');

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
       Schema::dropIfExists('amenity_apartment');
    }
};
