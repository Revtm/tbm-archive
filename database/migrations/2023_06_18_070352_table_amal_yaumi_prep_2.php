<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAmalYaumiPrep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('user_archive', function (Blueprint $table){
        $table->dropForeign(['user_id']);
      });

      Schema::table('users', function (Blueprint $table) {
          $table->uuid('id_')->nullable(false)->change();
          $table->dropPrimary('id');
          $table->primary('id_');
      });

      Schema::table('user_archive', function (Blueprint $table) {
          $table->uuid('id_')->nullable(false)->change();
          $table->uuid('user_id_')->nullable(false)->change();
          $table->dropPrimary('id');
          $table->primary('id_');
          $table->foreign('user_id_')->references('id_')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
