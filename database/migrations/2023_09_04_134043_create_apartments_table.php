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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->text('title');
            $table->text('description')->nullable();
            $table->tinyint('rooms');
            $table->tinyint('beds');
            $table->tinyint('bathrooms');
            $table->smallint('squareMeters');
            $table->varchar('address', 255);
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->varchar('image', 255);
            $table->tinyint('visible')->default;

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
        Schema::dropIfExists('apartments');
    }
};
