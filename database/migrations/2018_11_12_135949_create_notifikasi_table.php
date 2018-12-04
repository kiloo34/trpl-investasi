<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->String('subject');
            $table->boolean('seen')->default(false);
            $table->integer('id_pesanan')->unsigned()->nullable();
            $table->foreign('id_pesanan')->on('pesanan')->references('id');
            $table->integer('id_pembayaran')->unsigned()->nullable();
            $table->foreign('id_pembayaran')->on('mutasi')->references('id');
            $table->integer('id_diskusi')->unsigned()->nullable();
            $table->foreign('id_diskusi')->on('diskusi')->references('id');
            $table->integer('id_mutasi')->unsigned()->nullable();
            $table->foreign('id_mutasi')->on('mutasi')->references('id');
            $table->integer('id_balas')->unsigned()->nullable();
            $table->foreign('id_balas')->on('balas')->references('id');
            $table->integer('id_progres')->unsigned()->nullable();
            $table->foreign('id_progres')->on('progres')->references('id');
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
        Schema::dropIfExists('notifikasi');
    }
}
