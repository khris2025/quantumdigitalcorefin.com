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
        Schema::create('crypto_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('users_name');
            $table->string('users_email');
            $table->integer('amount');
            $table->string('status')->default('pending'); // Optional field
            $table->string('coin_type');
            $table->string('wallet_address');
            $table->string('transid');
            $table->dateTime('dateadd'); // Use timestamp() instead of timestamps()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_withdrawals');
    }
};
