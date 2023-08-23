<?php

// database/migrations/2023_08_21_create_transaksis_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->foreignId('penanganan_id');
            $table->decimal('total_biaya', 10, 2);
            $table->decimal('pembayaran', 10, 2);
            $table->decimal('kembalian', 10, 2);
            // ... tambahkan atribut lainnya sesuai kebutuhan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
