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
        Schema::table('users', function (Blueprint $table) {
            // First check if the name column exists, then rename it
            if (Schema::hasColumn('users', 'name')) {
                // Rename name to first_name
                $table->renameColumn('name', 'first_name');
            } else {
                // If name doesn't exist, create first_name
                $table->string('first_name')->after('id');
            }
            
            // Add the rest of the fields
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('phone')->nullable()->after('email');
            $table->string('country')->nullable()->after('phone');
            $table->unsignedBigInteger('sponsor_id')->nullable()->after('country');
            $table->string('rank')->default('Member')->after('sponsor_id');
            $table->string('status')->default('active')->after('rank');
            
            // Add foreign key
            $table->foreign('sponsor_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['sponsor_id']);
            
            // Drop the added columns
            $table->dropColumn([
                'last_name',
                'phone',
                'country',
                'sponsor_id',
                'rank',
                'status'
            ]);
            
            // Rename first_name back to name if it exists
            if (Schema::hasColumn('users', 'first_name')) {
                $table->renameColumn('first_name', 'name');
            }
        });
    }
};
