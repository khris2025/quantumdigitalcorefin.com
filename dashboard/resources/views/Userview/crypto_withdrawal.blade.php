@extends('Userview.layouts.app')
@section('content')
<!-- Display Error Message -->
@error('message')
<script>
   Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: @json($message),
   });
</script>
@enderror
<!-- Display Success Message -->
@if(session('success'))
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: @json(session('success')),
   });
</script>
@endif
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Crypto Withdrawal</h4>
         </div>
         <!-- Card Deposit Form -->
         <form action="{{ route('crypto_withdrawal_add') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <!-- Card Number -->
            <div class="mb-3">
               <input type="text" class="form-control" id="card-number" name="amount" placeholder="Enter amount" required>
            </div>
            <!-- Card Number -->
            <div class="mb-3">
               <div class="form-floating ">
                  <select required id="floatingInput" name="ptype"  class="form-select">
                     <option value >Select Coin Type</option>
                     <option value="Bitcoin_bitcoin">Bitcoin (Network ~ Bitcoin)</option>
                     <option value="Bitcoin_bep20">Bitcoin (Network ~ BEP20)</option>
                     <option value="Ethereum_erc20">Ethereum (Network ~ ERC20)</option>
                     <option value="Ethereum_bep20">Ethereum (Network ~ BEP20)</option>
                     <option value="USDT_trc20">USDT (Network ~ TRC20)</option>
                     <option value="USDT_bep20">USDT (Network ~ BEP20)</option>
                     <option value="USDT_erc20">USDT (Network ~ ERC20)</option>
                  </select>
               </div>
            </div>
            <div class="mb-3">
               <input type="text" class="form-control" id="card-number" name="wallet_address" placeholder="Enter wallet address" required>
            </div>
            <div class="mb-3">
               <input type="text" class="form-control" id="card-number" name="secretCode" placeholder="Enter Transaction PIN" required>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary">Withdraw Funds</button>
            </div>
         </form>










            
      </div>
   </div>
</div>
@endsection