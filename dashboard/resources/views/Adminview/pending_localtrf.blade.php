@extends('Adminview.layout.app')
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
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  {{-- <h4 class="mb-sm-0 font-size-18">Pending Local Transfer</h4> --}}
                  <div class="page-title-right">
                     {{-- <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Pending Local Transfer</li>
                     </ol> --}}
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending Local Transfer</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              {{-- <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Deposits 
                              </a> --}}
                           </li>
                        </ul>
                        <!-- end nav tabs -->
                     </div>
                  </div>
                  <!-- end card header -->
                  <div class="card-body px-0">
                     <div class="tab-content">
                        <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar >
                              





                              <table class="table table-bordered">
                                 <thead>
                                       <tr>
                                          <th>ID</th>
                                          <th>Date</th>
                                          <th>senders name</th>
                                          <th>Senders email</th>
                                          <th>Transaction ID</th>
                                          <th>Recipient name</th>
                                          <th>Account number</th>
                                          <th>Bank name</th>
                                          <th>Routing number</th>
                                          <th>amount</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                 </thead>
                                 <tbody>

                                       @if ($pending_localtrf->isEmpty())
                                          <tr>
                                             <td colspan="8" class="text-center">No Pending Local Transfers found.</td>
                                          </tr>
                                          @else
                                          @foreach ($pending_localtrf as $pending_localtrf)
                                          <tr>
                                             <td>{{ $pending_localtrf->id }}</td>
                                             <td>{{ $pending_localtrf->created_at->format('F j, Y') }}</td>
                                             <td>{{ $pending_localtrf->senders_name }}</td>
                                             <td>{{ $pending_localtrf->senders_email }}</td>
                                             <td>{{ $pending_localtrf->transid }}</td>
                                             <td>{{ $pending_localtrf->recipient_name }}</td>
                                             <td>{{ $pending_localtrf->recipient_account_number }}</td>
                                             <td>{{ $pending_localtrf->recipient_bank_name }}</td>
                                             <td>{{ $pending_localtrf->recipient_routing_number }}</td>
                                             <td>${{ number_format($pending_localtrf->amount) }}</td>
                                             <td>{{ $pending_localtrf->status }}</td>
                                             <td><a href="{{ route('deposit_action', ['action' => 'confirm','id' => $pending_localtrf->id]) }}" class="btn btn-rounded btn-success">Approve</a>
                                                <br>
                                                <br>
                                                <a href="{{ route('deposit_action', ['action' => 'decline','id' => $pending_localtrf->id]) }}" class="btn btn-rounded btn-danger">Decline</a>
                                             </td>
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
         </div>
      </div>
   </div>
</div>
@endsection