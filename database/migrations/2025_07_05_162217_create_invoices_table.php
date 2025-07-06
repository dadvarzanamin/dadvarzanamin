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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('product_id')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_price')->nullable();
            $table->string('type_use')->nullable();
            $table->string('certificate')->nullable();
            $table->string('certificate_price')->nullable();
            $table->string('license')->nullable();
            $table->string('license_time')->nullable();
            $table->string('license_price')->nullable();
            $table->string('offer_discount')->nullable();
            $table->string('offer_percentage')->nullable();
            $table->string('price')->nullable();
            $table->string('price_status')->nullable();
            $table->text('transactionId')->nullable();
            $table->string('referenceId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
