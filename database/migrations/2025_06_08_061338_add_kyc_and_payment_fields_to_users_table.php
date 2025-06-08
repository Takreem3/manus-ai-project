<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKycAndPaymentFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_document')->nullable();
            $table->boolean('kyc_verified')->default(false);
            $table->boolean('payment_verified')->default(false);
            $table->string('payment_transaction_id')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            $table->timestamp('payment_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'id_type',
                'id_number',
                'id_document',
                'kyc_verified',
                'payment_verified',
                'payment_transaction_id',
                'payment_amount',
                'payment_date'
            ]);
        });
    }
}
