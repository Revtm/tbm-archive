<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUserPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_archive', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->integer('archive_type');
          $table->text('source');
          $table->text('archive_origin');
          $table->text('captions');
          $table->integer('likes');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_archive');
    }
}
