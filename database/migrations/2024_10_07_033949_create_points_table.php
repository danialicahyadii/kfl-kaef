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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->integer('match_points')->default(0);  // Poin pertandingan
            $table->integer('match_wins')->default(0);    // Total menang pertandingan
            $table->integer('match_losses')->default(0);  // Total kalah pertandingan
            $table->integer('game_wins')->default(0);     // Total menang game (dalam pertandingan)
            $table->integer('game_losses')->default(0);   // Total kalah game (dalam pertandingan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
