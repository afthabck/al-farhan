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
        Schema::create('r__f__q__customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->text('address')->nullable();
            $table->text('StreetAddress')->nullable();
            $table->boolean('is_shipping')->default(0);
            $table->boolean('is_billing')->default(0);
            $table->boolean('is_primary')->default(0);
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r__f__q__customer_addresses');
    }
};
