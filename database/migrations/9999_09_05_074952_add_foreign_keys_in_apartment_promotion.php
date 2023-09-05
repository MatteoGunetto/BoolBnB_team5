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
        Schema::table('apartment_promotion', function (Blueprint $table) {
            //qua creiamo le colonne
            $table->unsignedBigInteger("apartment_id");
            $table->unsignedBigInteger("promotion_id");


            //qua creiamo le relazioni
            $table->foreign("apartment_id")
            ->references("id")
            ->on("apartments");

            $table->foreign("promotion_id")
            ->references("id")
            ->on("promotions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartment_promotion', function (Blueprint $table) {
            // distruggi relazioni
            $table->dropForeign('apartment_promotion_apartment_id_foreign');
            $table->dropForeign('apartment_promotion_promotion_id_foreign');

            // Distruggi colonna
            $table->dropColumn(['apartment_id', 'promotion_id']);
        });
    }
};
