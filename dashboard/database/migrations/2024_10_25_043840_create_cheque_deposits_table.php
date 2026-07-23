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
        Schema::create('cheque_deposits', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('fullname');
            $table->string('email');

            $table->integer('amount');
            $table->string('proof')->nullable();



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
        Schema::dropIfExists('cheque_deposits');
    }
};
