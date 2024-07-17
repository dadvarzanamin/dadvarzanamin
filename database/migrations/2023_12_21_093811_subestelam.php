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
        Schema::create('subestelams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estelam_id');
            $table->foreign('estelam_id')->references('id')->on('estelams')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subestelams');
    }
};
