<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisKBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->string('nama_pasangan');
            $table->string('jenis_kb');
            $table->string('tanggal_pemasangan');
            $table->string('jumlah_anak');
            $table->string('keterangan');
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
        Schema::dropIfExists('rekam_medis_k_b_s');
    }
}
