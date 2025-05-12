<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('user_id');

            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik')->unique();
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['Putra', 'Putri']);  
            $table->string('akte')->nullable();
            $table->string('sertifikat_sabuk')->nullable();
            $table->enum('jenis_pertandingan', ['Kyourigi', 'Poomsae', 'Poomsae Freestyle']);
            $table->enum('kelompok_umur', ['Pra Cadet A', 'Pra Cadet B', 'Pra Cadet C', 'Cadet', 'Junior', 'Senior']);
            $table->enum('tingkat_pertandingan', ['Pemula', 'Semi Prestasi', 'Prestasi']);
            $table->string('kelas_pertandingan')->nullable();
            $table->boolean('sudah_bayar')->default(false);
            $table->integer('jumlah_pembayaran')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
