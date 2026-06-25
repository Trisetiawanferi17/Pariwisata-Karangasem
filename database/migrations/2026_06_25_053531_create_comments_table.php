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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Menghubungkan komentar ke id user yang membuat ulasan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Menghubungkan komentar ke id destinasi wisata dari array dummy
            $table->integer('wisata_id');
            // Isi pesan komentar
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};