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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('gaji_min');
            $table->string('gaji_max');
            $table->unsignedBigInteger('jenis_job_id');
            $table->foreign('jenis_job_id')->references('id')->on('jenis_jobs')->onDelete('cascade');
            $table->unsignedBigInteger('tipe_job_id');
            $table->foreign('tipe_job_id')->references('id')->on('tipe_jobs')->onDelete('cascade');
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->string('pendidikan');
            $table->string('kualifikasi');
            $table->string('exp_date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
