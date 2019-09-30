<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing', function (Blueprint $table) {
            $table->bigIncrements('id_packing');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->date('tgl_expired');
            $table->date('tgl_produksi');
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
        Schema::dropIfExists('packing');
    }
}
