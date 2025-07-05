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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('vat')->nullable();
            $table->string('customer_source')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('website')->nullable();
            $table->string('industry_type')->nullable();
            $table->string('customer_category')->nullable();
            $table->string('customer_industry')->nullable();
            $table->string('customer_logo')->nullable();
            $table->string('document_type')->nullable();
            $table->string('documents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
