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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que reporta
            $table->foreignId('reported_user_id')->nullable()->constrained('users')->onDelete('cascade'); // Usuario reportado
            $table->foreignId('post_id')->nullable()->constrained()->onDelete('cascade'); // Publicación reportada
            $table->text('reason')->nullable(); // Razón del reporte
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
