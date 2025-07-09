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
        Schema::table('enquiry_customer_bank_accounts', function (Blueprint $table) {
            Schema::rename('r__f__q__customer__bank__accounts', 'enquiry_customer_bank_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_customer_bank_accounts', function (Blueprint $table) {
            Schema::rename('enquiry_customer_bank_accounts', 'r__f__q__customer__bank__accounts');
        });
    }
};
