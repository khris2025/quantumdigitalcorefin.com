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
                    Payment Request History
                </div>
                <div class="card-body">
                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Request ID</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Requested On</th>
                                    <th>Processed On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- @forelse($requests as $index => $request)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $request->request_id }}</td>
                                    <td>${{ number_format($request->amount, 2) }}</td>
                                    <td>{{ ucfirst($request->method) }}</td>
                                    <td>
                                        @if($request->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($request->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $request->created_at->format('d M, Y') }}</td>
                                    <td>{{ $request->processed_at ? $request->processed_at->format('d M, Y') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('client.payment.request.details', $request->id) }}" class="btn btn-sm btn-info">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No payment requests found.</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="d-flex justify-content-center mt-3">
                        {{ $requests->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection