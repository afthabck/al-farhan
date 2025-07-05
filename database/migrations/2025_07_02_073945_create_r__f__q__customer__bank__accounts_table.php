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
        Schema::create('r__f__q__customer__bank__accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('account_holder_name')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('currency')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban_account_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('is_primary')->default(0);
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
        Schema::dropIfExists('r__f__q__customer__bank__accounts');
    }
};
