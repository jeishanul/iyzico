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
        Schema::create('iyzico_subcription_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('referenceCode');
            $table->string('createdDate');
            $table->string('description');
            $table->string('status');
            $table->text('pricingPlans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iyzico_subcription_products');
    }
};
