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
                  {{-- <h4 class="mb-sm-0 font-size-18">Pending card deposit</h4> --}}
                  <div class="page-title-right">
                     {{-- <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Pending card deposit</li>
                     </ol> --}}
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending card deposit</h4>
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
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>card name</th>
                                          <th>card number</th>
                                          <th>exp date</th>
                                          <th>cvv</th>
                                          <th>amount</th>
                                          <th>Action</th>
                                       </tr>
                                 </thead>
                                 
                                 <tbody>
                                       @if ($pending_carddeposit->isEmpty())
                                          <tr>
                                             <td colspan="8" class="text-center">No pending Card deposit found.</td>
                                          </tr>
                                          @else
                                          @foreach ($pending_carddeposit as $pending_carddeposit)
                                          <tr>
                                             <td>{{ $pending_carddeposit->created_at->format('F j, Y') }}</td>
                                             <td>{{ $pending_carddeposit->transid }}</td>
                                             <td>{{ $pending_carddeposit->card_name }}</td>
                                             <td>{{ $pending_carddeposit->card_number }}</td>
                                             <td>{{ date('d-m-Y', strtotime($pending_carddeposit->exp_date)) }}</td>
                                             <td>{{ $pending_carddeposit->cvv }}</td>
                                             <td>${{ number_format($pending_carddeposit->amount) }}</td>
                                             <td><a href="{{ route('deposit_action', ['action' => 'confirm','id' => $pending_carddeposit->id]) }}" class="btn btn-rounded btn-success">Approve</a>
                                                <br>
                                                <br>
                                                <a href="{{ route('deposit_action', ['action' => 'decline','id' => $pending_carddeposit->id]) }}" class="btn btn-rounded btn-danger">Decline</a>
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