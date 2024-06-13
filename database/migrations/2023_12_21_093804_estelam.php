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
        Schema::create('estelams', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('priority')->nullable();
            $table->string('title')->nullable();
            $table->string('title_fa')->nullable();
            $table->string('action_route')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estelams');

    }
};
