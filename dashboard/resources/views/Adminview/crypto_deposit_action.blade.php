@extends('Adminview.layout.app') @section('content') @error('message')
<script>
       Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: @json($message),
    });
</script>
@enderror @if(session('success'))
<script>
    Swal.fire({
       icon: 'success',
       title: 'Success',
       text: @json(session('success')),
    });
</script>
@endif
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        {{--
                        <h4 class="mb-sm-0 font-size-18">Pending Crypto Deposit</h4>
                        --}}
                        <div class="page-title-right">
                            {{--
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Pending Crypto Deposit</li>
                            </ol>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Pending Crypto Deposit</h4>
                            <div class="flex-shrink-0">
                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                    <li class="nav-item">
                                        {{--
                                        <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                                            crypto_deposit_action
                                        </a>
                                        --}}
                                    </li>
                                </ul>
                                <!-- end nav tabs -->
                            </div>
                        </div>
                        <!-- end card header -->
                        <div class="card-body px-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date Added</th>
                                                    <th>Amount</th>
                                                    <th>Payment-Type</th>
                                                    <th>Transaction-ID</th>
                                                    <th>Coin Type</th>
                                                    <th>proof</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($crypto_deposit_action->isEmpty())
                                                <tr>
                                                    <td colspan="8" class="text-center">No pending Crypto Deposit found.</td>
                                                </tr>
                                                @else @foreach ($crypto_deposit_action as $crypto_deposit_action)
                                                <tr>
                                                    
                                                    <td style="font-size: 16px;" class="font-w400">{{ $crypto_deposit_action->id }}</td>
                                                    <td style="font-size: 16px;" class="font-w400">{{ $crypto_deposit_action->dateadd->format('F j, Y g:i A') }}</td>
                                                    <td style="font-size: 16px;" class="font-w400">${{ number_format($crypto_deposit_action->amount) }}</td>
                                                    <td style="font-size: 16px;" class="font-w400">{{ $crypto_deposit_action->ptype }}</td>
                                                    <td style="font-size: 16px;" class="font-w400">{{ $crypto_deposit_action->transid }}</td>
                                                    <td style="font-size: 16px;" class="font-w400">{{ $crypto_deposit_action->ptype }}</td>
                                                    <td>
                                                        <img id="blah" src="{{ url('storage/proof_images/' .$crypto_deposit_action->proof) }}" style="border-radius: 10%; height: 150px;" alt="Uploaded Image" />
                                                    </td>
                                                    <td><a href="{{ route('deposit_action', ['action' => 'confirm','id' => $crypto_deposit_action->id]) }}" class="btn btn-rounded btn-success">Approve</a>
                                                        <br>
                                                        <br>
                                                        <a href="{{ route('deposit_action', ['action' => 'decline','id' => $crypto_deposit_action->id]) }}" class="btn btn-rounded btn-danger">Decline</a>
                                                    </td>

                                                    
                                                    
                                                </tr>
                                                @endforeach @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
