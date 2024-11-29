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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('no_telepon');
            $table->string('pendidikan');
            $table->string('status_bekerja');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('foto_profil')->nullable();
            $table->string('cv')->nullable();
            $table->string('portofolio')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
