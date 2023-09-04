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
        Schema::table('views', function (Blueprint $table) {
            //qua creiamo la colonna
            $table->unsignedBigInteger("apartment_id");

            //qua creiamo la relazione
            $table->foreign("apartment_id")
                ->references("id")
                ->on("apartments");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('views', function (Blueprint $table) {
            //$table->dropForeign("views_apartment_id_foreign")

            //$table->dropColumn("apartment_id");
        });
    }
};
