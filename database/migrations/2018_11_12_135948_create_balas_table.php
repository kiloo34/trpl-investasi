<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('balas');
            $table->integer('id_diskusi')->unsigned();
            $table->foreign('id_diskusi')->on('diskusi')->references('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->on('users')->references('id');
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
        Schema::dropIfExists('balas');
    }
}
