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

            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('rooms');
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('bathrooms');
            $table->smallInteger('squareMeters');
            $table->string('address', 255);
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude',  9, 6);
            $table->string('image', 255)->nullable();
            $table->unsignedTinyInteger('visible')->default(1);

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
