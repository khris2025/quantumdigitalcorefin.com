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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('country');
            $table->date('date_of_birth');
            $table->string('account_status')->default('ACTIVE');
            $table->string('user_verify')->default('no');
            $table->string('pin', 10);
            $table->string('account_number_checking', 10)->unique();
            $table->string('account_number_savings', 10)->unique();
            $table->decimal('accbalance_checking', 15, 2)->default(0.00);
            $table->decimal('accbalance_savings', 15, 2)->default(0.00);
            $table->string('email_verify')->default('no');
            $table->integer('kyc_amount')->nullable();
            $table->string('kyc_verify')->default('no');
            $table->string('role')->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
