@extends('Userview.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pending Transactions</h4>
                <hr>
            </div>
        </div>
    </div>
    <!-- Wire Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Wire Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Recipient name</th>
                            <th>Account number</th>
                            <th>Bank name</th>
                            <th>Routing number</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($pendingWire->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending wire transfers found.</td>
                            </tr>
                            @else
                            @foreach ($pendingWire as $pendingWires)
                            <tr>
                                <td>{{ $pendingWires->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendingWires->transid }}</td>
                                <td>{{ $pendingWires->recipient_name }}</td>
                                <td>{{ $pendingWires->recipient_account_number }}</td>
                                <td>{{ $pendingWires->recipient_bank_name }}</td>
                                <td>{{ $pendingWires->recipient_routing_number }}</td>
                                <td>${{ number_format($pendingWires->amount) }}</td>
                                <td>{{ $pendingWires->status }}</td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Wire Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Crypto Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Coin type</th>
                            <th>Wallet address</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($pendingCryptoWithdrawal->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending crypto transfers found.</td>
                            </tr>
                            @else
                            @foreach ($pendingCryptoWithdrawal as $pendingCryptoWithdrawal)
                            <tr>
                                <td>{{ $pendingCryptoWithdrawal->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendingCryptoWithdrawal->transid }}</td>
                                <td>{{ $pendingCryptoWithdrawal->coin_type }}</td>
                                <td>{{ $pendingCryptoWithdrawal->wallet_address }}</td>
                                <td>${{ number_format($pendingWires->amount) }}</td>
                                <td>{{ $pendingWires->status }}</td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Grant Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Grant Request</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>amount</th>
                            <th>grant type</th>
                            <th>grant purpose</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendinggrantrequest->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending grant request found.</td>
                            </tr>
                            @else
                            @foreach ($pendinggrantrequest as $pendinggrantrequests)
                            <tr>
                                <td>{{ $pendinggrantrequests->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendinggrantrequests->transid }}</td>
                                <td>${{ number_format($pendinggrantrequests->amount) }}</td>
                                <td>{{ $pendinggrantrequests->grant_type }}</td>
                                {{-- <td>{{ $pendinggrantrequests->grant_purpose }}</td>    --}}
                                <td>
                                    <span class="short-text">
                                        {{ \Illuminate\Support\Str::limit($pendinggrantrequests->grant_purpose, 20) }}
                                        @if(strlen($pendinggrantrequests->grant_purpose) > 20)
                                            <a href="javascript:void(0);" onclick="toggleGrantText(this)">Read more</a>
                                        @endif
                                    </span>
                                    <span class="full-text" style="display: none;">
                                        {{ $pendinggrantrequests->grant_purpose }}
                                        <a href="javascript:void(0);" onclick="toggleGrantText(this)">Show less</a>
                                    </span>
                                </td>
                                <td>{{ $pendinggrantrequests->status }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleGrantText(link) {
            const shortText = link.closest('td').querySelector('.short-text');
            const fullText = link.closest('td').querySelector('.full-text');

            if (shortText.style.display === 'none') {
                shortText.style.display = '';
                fullText.style.display = 'none';
            } else {
                shortText.style.display = 'none';
                fullText.style.display = '';
            }
        }
    </script>








    <!-- Local Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Local Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Recipient name</th>
                            <th>Account number</th>
                            <th>Bank name</th>
                            <th>Routing number</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendingLocaltrf->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending Local transfers found.</td>
                            </tr>
                            @else
                            @foreach ($pendingLocaltrf as $pendingLocaltrf)
                            <tr>
                                <td>{{ $pendingLocaltrf->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendingLocaltrf->transid }}</td>
                                <td>{{ $pendingLocaltrf->recipient_name }}</td>
                                <td>{{ $pendingLocaltrf->recipient_account_number }}</td>
                                <td>{{ $pendingLocaltrf->recipient_bank_name }}</td>
                                <td>{{ $pendingLocaltrf->recipient_routing_number }}</td>
                                <td>${{ number_format($pendingLocaltrf->amount) }}</td>
                                <td>{{ $pendingLocaltrf->status }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 

    <!-- Card Deposits Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Card Deposits</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>card name</th>
                            <th>card number</th>
                            <th>exp date</th>
                            <th>cvv</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if ($pendingCarddeposit->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending Card deposit found.</td>
                            </tr>
                            @else
                            @foreach ($pendingCarddeposit as $pendingCarddeposit)
                            <tr>
                                <td>{{ $pendingCarddeposit->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendingCarddeposit->transid }}</td>
                                <td>{{ $pendingCarddeposit->card_name }}</td>
                                <td>{{ $pendingCarddeposit->card_number }}</td>
                                <td>{{ date('d-m-Y', strtotime($pendingCarddeposit->exp_date)) }}</td>
                                <td>{{ $pendingCarddeposit->cvv }}</td>
                                <td>${{ number_format($pendingCarddeposit->amount) }}</td>
                                <td>{{ $pendingCarddeposit->status }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Cheque Deposits Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Cheque Deposits</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Cheque</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendingchequedeposit->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No pending Cheque Deposit found.</td>
                            </tr>
                            @else
                            @foreach ($pendingchequedeposit as $pendingchequedeposit)
                            <tr>
                                <td>{{ $pendingchequedeposit->created_at->format('F j, Y') }}</td>
                                <td>{{ $pendingchequedeposit->transid }}</td>
                                <td>{{ $pendingchequedeposit->card_name }}</td>
                                <td>
                                    <a href="{{ url('storage/proof_images/' . $pendingchequedeposit->proof) }}">
                                        <img id="blah" src="{{ url('storage/proof_images/' . $pendingchequedeposit->proof) }}" style="border-radius: 10%;  height: 150px;" alt="Uploaded Image">
                                    </a>
                                </td>
                                <td>${{ number_format($pendingchequedeposit->amount) }}</td>
                                <td>{{ $pendingchequedeposit->status }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    

    <!-- Crypto Deposits Table -->
         <div class="row mt-4">
            <div class="col-12">
               <h5>Pending Crypto Deposit</h5>
               <hr>
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                       <tr>
                           <th>ID</th>
                           <th>Date Added</th>
                           <th>Amount</th>
                           <th>Payment-Type</th>
                           <th>Transaction-ID</th>
                           <th>Status</th>
                           <th>Control</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if ($deposits->isEmpty())
                        <tr>
                           <td colspan="8" class="text-center">No pending Crypto Deposit found.</td>
                        </tr>
                        @else
                        @foreach ($deposits as $deposits)
                        <tr>
                           @php
                              if ($deposits->status == 'unconfirmed' || $deposits->status == 'canceled') {
                              $buttonClass = 'btn btn-sm btn-rounded btn-outline-success';
                              $buttonText = 'View';
                              } else {
                              $buttonClass = 'btn btn-sm btn-rounded btn-outline-primary';
                              $buttonText = 'Attach Proof';
                              }
                           @endphp
                           <td style="font-size: 16px;" class="font-w400 ">{{ $deposits->id }}</td>
                           <td style="font-size: 16px;" class="font-w400 ">{{ $deposits->dateadd->format('F j, Y g:i A') }}</td>
                           <td style="font-size: 16px;" class="font-w400 ">${{ number_format($deposits->amount) }}</td>
                           <td style="font-size: 16px;" class="font-w400 ">{{ $deposits->ptype }}</td>
                           <td style="font-size: 16px;" class="font-w400 ">{{ $deposits->transid }}</td>
                           <td style="font-size: 16px;" > <button type="button " class="btn btn-rounded btn-sm btn-outline-warning">
                              <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                              {{ $deposits->status }}
                              </button>
                           </td>
                           <td>
                              @if ($deposits->status == 'pending')
                              <a href="{{ route('makepayment', ['id' => $deposits->id]) }}"
                                 class="{{ $buttonClass }}">
                              {{ $buttonText }}
                              </a>
                              @else
                              <a href="{{ route('makepayment', ['id' => $deposits->id]) }}"
                                 class="{{ $buttonClass }}">
                              {{ $buttonText }}
                              </a>
                              {{-- <button type="button" class="{{ $buttonClass }}">
                              {{ $buttonText }}
                              </button> --}}
                              @endif
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>





    <!-- Request Money Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Request Money Transactions</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Requester</th>
                            <th>Requestee</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($requestMoney as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->requester_name }}</td>
                            <td>{{ $transaction->requestee_name }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->created_at->format('d M Y') }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>
                                @if($transaction->status === 'Pending')
                                <a href="{{ route('approve.request', $transaction->id) }}" class="btn btn-success btn-sm">Approve</a>
                                <a href="{{ route('cancel.request', $transaction->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                @else
                                <span class="text-muted">No Action</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
