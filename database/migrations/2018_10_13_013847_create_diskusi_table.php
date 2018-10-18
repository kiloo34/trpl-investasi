<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiskusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade');
            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->on('produk')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('diskusi');
    }
}
