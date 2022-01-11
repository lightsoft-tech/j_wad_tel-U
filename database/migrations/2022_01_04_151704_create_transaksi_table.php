<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('menu_id');
            $table->string('alamat_pengiriman');
            $table->string('tanggal_pengiriman');
            $table->string('waktu_pengiriman');
            $table->enum('status_order', ['dalam proses', 'dalam perjalanan', 'diterima']);
            $table->enum('pembayaran', ['kartu debit', 'transfer', 'virtual account', 'belum dibayar']);
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
        Schema::dropIfExists('transaksi');
    }
}
