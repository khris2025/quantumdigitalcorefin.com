@extends('client.layouts.app')
@section('content')
<main>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <!-- Alert Message -->
            <div class="alert alert-success alert-dismissible" id="main_alert" role="alert" style="display: none;">
                <button type="button" id="close_alert" class="close">
                    <span aria-hidden="true"><i class="icofont-close-line-squared-alt"></i></span>
                </button>
                <span class="msg"></span>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header text-center">
                    My Loans
                </div>
                <div class="card-body">
                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Loan ID</th>
                                    <th>Amount</th>
                                    <th>Interest Rate</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- @forelse($loans as $index => $loan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $loan->loan_id }}</td>
                                    <td>${{ number_format($loan->amount, 2) }}</td>
                                    <td>{{ $loan->interest_rate }}%</td>
                                    <td>
                                        @if($loan->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($loan->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $loan->start_date->format('d M, Y') }}</td>
                                    <td>{{ $loan->end_date->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('client.loans.history', $loan->id) }}" class="btn btn-sm btn-info">
                                            View History
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No loans found.</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="d-flex justify-content-center mt-3">
                        {{ $loans->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection