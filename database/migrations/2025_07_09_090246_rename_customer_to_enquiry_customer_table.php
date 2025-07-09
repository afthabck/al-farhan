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
        Schema::table('enquiry_customer', function (Blueprint $table) {
            Schema::rename('customers', 'enquiry_customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_customer', function (Blueprint $table) {
             Schema::rename('enquiry_customers', 'customers');
        });
    }
};
