@extends('client.layouts.app')
@section('content')
<div class="container-fluid p-4">

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="text-white">Account Statement</h3>
            <p class="text-white">View your account balance, total credits, debits, and transaction history.</p>
        </div>
    </div>





    <!-- Filter Options -->
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="start_date" class="form-label text-white">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label text-white">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <div class="col-md-3 align-self-end">
            <button class="btn btn-success w-100">Filter</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    Recent Transactions
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="font-size:0.8rem">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount ($)</th>
                                    <th>Account</th>
                                    <th>Type</th>
                                    <th>Debit/Credit</th>
                                    <th>Status</th>
                                    <th>Transaction id</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if ($transactions->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No Transactions</td>
                                    </tr>
                                    @else
                                    @foreach ($transactions as $transactions)
                                    <tr>
                                        <td>{{ $transactions->dateadd->format('F j, Y') }}</td>
                                        <td>${{ number_format($transactions->amount) }}</td>
                                        <td>{{ $transactions->account }}</td>
                                        <td>{{ $transactions->transaction_name }}</td>
                                        <td>
                                            <span style="color: {{ $transactions->transaction_type == 'debit' ? 'red' : 'green' }}">
                                                {{ ucfirst($transactions->transaction_type) }}
                                            </span>
                                        </td>
                                        <td>{{ $transactions->status }}</td>
                                        <td>{{ $transactions->transaction_id }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection