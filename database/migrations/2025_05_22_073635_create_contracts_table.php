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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->enum('paid_type', ['free', 'paid'])->default('free');
            $table->string('price')->default(0);
            $table->string('discount')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('count_download')->nullable();
            $table->integer('status')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
