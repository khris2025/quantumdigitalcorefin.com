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
                    My FDR History
                </div>
                <div class="card-body">
                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>FDR ID</th>
                                    <th>Amount</th>
                                    <th>Interest Rate</th>
                                    <th>Tenure</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>Maturity Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- @forelse($fdrs as $index => $fdr)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $fdr->fdr_id }}</td>
                                    <td>${{ number_format($fdr->amount, 2) }}</td>
                                    <td>{{ $fdr->interest_rate }}%</td>
                                    <td>{{ $fdr->tenure }} months</td>
                                    <td>
                                        @if($fdr->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($fdr->status == 'matured')
                                            <span class="badge bg-primary">Matured</span>
                                        @else
                                            <span class="badge bg-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td>{{ $fdr->start_date->format('d M, Y') }}</td>
                                    <td>{{ $fdr->maturity_date->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('client.fdr.details', $fdr->id) }}" class="btn btn-sm btn-info">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">No FDRs found.</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="d-flex justify-content-center mt-3">
                        {{ $fdrs->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection