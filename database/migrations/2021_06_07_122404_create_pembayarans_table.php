<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->integer('id_pesanan')->unsigned();
            $table->integer('id_bank')->unsigned();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('file_pembayaran')->nullable();
            $table->string('status');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_bank')->references('id_bank')->on('banks')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
