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
        Schema::table('properties', function (Blueprint $table) {
            // Remove the address_id column
            $table->dropForeign(['address_id']);  // Drop foreign key constraint first if it exists
            $table->dropColumn('address_id');     // Then drop the column

            // Add new address-related columns
            $table->string('street_address')->after('landlord_id');
            $table->string('address_line_2')->nullable()->after('street_address');
            $table->string('suburb')->after('address_line_2');
            $table->string('city')->after('suburb');
            $table->string('province')->after('city');
            $table->string('postal_code')->after('province');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Add back the address_id column
            $table->foreignId('address_id')->constrained()->onDelete('cascade')->after('landlord_id');

            // Drop the new address-related columns
            $table->dropColumn(['street_address', 'address_line_2', 'suburb', 'city', 'province', 'postal_code']);
        });
    }
};
