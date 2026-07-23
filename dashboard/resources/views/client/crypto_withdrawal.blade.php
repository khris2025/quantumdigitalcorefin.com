@extends('client.layouts.app')
@section('content')
@error('message')
<script>
   Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: @json($message),
   });
</script>
@enderror
@if(session('success'))
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: @json(session('success')),
   });
</script>
@endif
<div class="card-body">
    <form action="{{ route('crypto_withdrawal_add') }}" method="POST" class="p-4 border rounded bg-light">
        @csrf
        <h5 class="mb-4 text-primary">Crypto Withdrawal</h5>

        <!-- Choose Account -->
        <div class="mb-3">
            <label class="form-label text-success" for="from_account">From Account</label>
            <select class="form-control" id="from_account" name="from_account" required>
                <option value="checking">Checking - {{ Auth::user()->account_number_checking}} (${{ number_format(Auth::user()->accbalance_checking) }})  </option>
                <option value="savings">Savings - {{ Auth::user()->account_number_savings}} (${{ number_format(Auth::user()->accbalance_savings) }}) </option>
            </select>
        </div>

        <!-- Crypto Type -->
        <div class="mb-3">
            <label class="form-label text-success" for="crypto_type">Select Crypto</label>
            <select class="form-control" id="crypto_type" name="crypto_type" required>
                <option value="BTC">Bitcoin (BTC)</option>
                <option value="ETH">Ethereum (ETH)</option>
                <option value="USDT">Tether (USDT)</option>
                <option value="BNB">Binance Coin (BNB)</option>
            </select>
        </div>

        <!-- Wallet Address -->
        <div class="mb-3">
            <label class="form-label text-success" for="wallet_address">Wallet Address</label>
            <input type="text" class="form-control" id="wallet_address" name="wallet_address" placeholder="Enter Wallet Address" required>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">Amount</label>
            <input type="number" step="0.0001" min="0.0001" class="form-control" id="amount" name="amount" placeholder="Enter Amount to Withdraw" required>
        </div>

        <!-- Transaction PIN -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">PIN</label>
            <input type="number"  class="form-control" id="pin" name="pin" placeholder="Enter PIN to Withdraw" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Crypto Withdrawal</button>
    </form>
</div>
@endsection