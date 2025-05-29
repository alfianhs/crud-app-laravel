<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->biginteger('nik');
            $table->biginteger('jenisPegawai_id')->unsigned();
            $table->biginteger('statusPegawai_id')->unsigned();
            $table->string('unit');
            $table->string('sub_unit');
            $table->biginteger('pendidikan_id')->unsigned();
            $table->string('tgl_lahir');
            $table->string('tmpt_lahir');
            $table->biginteger('jnsKel_id')->unsigned();
            $table->biginteger('agama_id')->unsigned();
            $table->string('gambar');
            $table->foreign('agama_id')->references('id')->on('agama')->onDelete('set null');;
            $table->foreign('jenisPegawai_id')->references('id')->on('jenis_pegawai')->onDelete('set null');
            $table->foreign('statusPegawai_id')->references('id')->on('status_pegawai')->onDelete('set null');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikan')->onDelete('set null');
            $table->foreign('jnsKel_id')->references('id')->on('jenis_kelamin')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
