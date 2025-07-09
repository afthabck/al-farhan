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
        Schema::table('enquiry_customer_point_of_contacts', function (Blueprint $table) {
            Schema::rename('r__f__q__customer_ponit_of_contacts', 'enquiry_customer_point_of_contacts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_customer_point_of_contacts', function (Blueprint $table) {
            Schema::rename('enquiry_customer_point_of_contacts', 'r__f__q__customer_ponit_of_contacts');
        });
    }
};
