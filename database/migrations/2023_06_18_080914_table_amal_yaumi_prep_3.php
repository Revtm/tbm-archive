<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAmalYaumiPrep3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('id');
        $table->renameColumn('id_', 'id');
      });
      Schema::table('user_archive', function (Blueprint $table) {
        $table->dropColumn('id');
        $table->dropColumn('user_id');
        $table->renameColumn('id_', 'id');
        $table->renameColumn('user_id_', 'user_id');
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
