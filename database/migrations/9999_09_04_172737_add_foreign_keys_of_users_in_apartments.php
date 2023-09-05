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
        Schema::table('apartments', function (Blueprint $table) {
             //qua creiamo la colonna
             $table->unsignedBigInteger("user_id");

             //qua creiamo la relazione
             $table->foreign("user_id")
                 ->references("id")
                 ->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            //$table->dropForeign("apartments_user_id_foreign")

            //$table->dropColumn("user_id");
        });
    }
};
