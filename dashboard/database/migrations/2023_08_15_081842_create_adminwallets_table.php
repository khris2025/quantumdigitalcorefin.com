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
        Schema::create('adminwallets', function (Blueprint $table) {
            $table->id();
            $table->string('btc_address_bitcoin')->default('btc_address_bitcoin');
            $table->string('btc_address_bep20')->default('btc_address_bep20');

            $table->string('eth_address_erc20')->default('eth_address_erc20');
            $table->string('eth_address_bep20')->default('eth_address_bep20');

            $table->string('usdt_address_trc20')->default('usdt_address_trc20');
            $table->string('usdt_address_bep20')->default('usdt_address_bep20');
            $table->string('usdt_address_erc20')->default('usdt_address_erc20');



            $table->string('btc_address_bitcoin_qr')->default('usdt_address_trc20');
            $table->string('btc_address_bep20_qr')->default('usdt_address_trc20');
            $table->string('eth_address_erc20_qr')->default('usdt_address_trc20');
            $table->string('eth_address_bep20_qr')->default('usdt_address_trc20');
            $table->string('usdt_address_trc20_qr')->default('usdt_address_trc20');
            $table->string('usdt_address_bep20_qr')->default('usdt_address_trc20');
            $table->string('usdt_address_erc20_qr')->default('usdt_address_trc20');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminwallets');
    }
};
