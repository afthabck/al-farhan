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
        Schema::table('enquiry_customer_addresses', function (Blueprint $table) {
            Schema::rename('r__f__q__customer_addresses', 'enquiry_customer_addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_customer_addresses', function (Blueprint $table) {
            Schema::rename('enquiry_customer_addresses', 'r__f__q__customer_addresses');
        });
    }
};
