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
        Schema::create('r__f__q__customer_ponit_of_contacts', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('full_name')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->boolean('is_primary')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r__f__q__customer_ponit_of_contacts');
    }
};
