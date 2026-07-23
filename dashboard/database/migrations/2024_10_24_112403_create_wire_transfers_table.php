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
        Schema::create('wire_transfers', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('senders_email');
            $table->string('senders_name');
            $table->string('account_sent_from');
            $table->string('recipient_name');
            $table->string('recipient_account_number');
            $table->string('recipient_bank_name');
            $table->string('recipient_routing_number');
            $table->integer('amount');
            $table->string('description')->nullable(); // Optional field
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
        Schema::dropIfExists('wire_transfers');
    }
};
