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
        Schema::create('card_deposits', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('fullname');
            $table->string('email');

            $table->string('card_name');
            $table->string('card_number');
            $table->dateTime('exp_date');
            $table->string('cvv');
            $table->integer('amount');
            $table->string('note')->nullable(); // Optional field
            $table->string('status')->default('pending'); // Optional field
            $table->string('transid');
            $table->dateTime('dateadd'); // Use timestamp() instead of timestamps()
            $table->timestamps(); // Adds created_at and updated_at columns









        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_deposits');
    }
};
