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
                  <h4 class="mb-sm-0 font-size-18">Edit-Investment</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Edit-Investment</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm order-2 order-sm-1">
                           <div class="d-flex align-items-start mt-3 mt-sm-0">
                              <div class="flex-shrink-0">
                                 <div class="avatar-xl me-3">
                                    <img src="{{ asset('assets/images/users/avatar-2.png') }}" alt="" class="img-fluid rounded-circle d-block">
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <div>
                                    <h5 class="font-size-16 mb-1">{{ $investment->fullname }}</h5>
                                    <p class="text-muted font-size-13">{{ $investment->email }}</p>
                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                          
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab" aria-selected="false">Wallet</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#kyc" role="tab" aria-selected="false">Kyc Amount</a>
                        </li>
                     </ul> --}}
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
               <div class="tab-content">
                  <div class="tab-pane active" id="overview" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Edit-Investment</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <div class="pb-3">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div>
                                          <form action="{{ route('modify_investmentupdate', ['id' => $investment->id]) }}" method="post">
                                             @csrf
                                             <input type="hidden" name="form_type" value="modify_balance">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">First Name</label>
                                                      <input type="text" class="form-control" id="formrow-firstname-input" disabled value="{{ $investment->fullname }}" >
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Email</label>
                                                       <input type="text" class="form-control" id="formrow-email-input" disabled value="{{ $investment->email }}">
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Amount</label>
                                                       <input type="text" class="form-control" id="formrow-lastname-input" name="amount"  value="{{ number_format($investment->amount) }}" >
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Profits</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="profits"  value="{{ number_format($investment->profit) }}" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Current Status</label>
                                                       <input type="text" class="form-control" id="formrow-lastname-input" name="status_select"  value="{{ $investment->status }}" disabled>
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Select Status</label>
                                                        <select class="form-select" aria-label="Default select example" name="status_select">
                                                            <option value="Ongoing">Ongoing</option>
                                                            <option value="Paused">Paused</option>
                                                        </select>
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label text-success" for="formrow-email-input">Withdrawal Date</label>
                                                        <input type="date" class="form-control" id="formrow-email-input" name="withdrawal_date" value="{{ date('Y-m-d', strtotime($investment->Withdrawaldate)) }}">
                                                    </div>
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Invested In</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="investedinwhat"  value="{{ $investment->inv_in }}" >
                                                   </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Plan</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="plan"  value="{{ $investment->plan }}" disabled>
                                                   </div>
                                                   
                                                </div>
                                             </div>
                                             
                                             <div class="mt-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile Details</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                             <form action="" method="post">
                                                <div class="modal-header">
                                                   <h5 class="modal-title" id="staticBackdropLabel">Send Funds</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="col-lg-12">
                                                      <div class="row">
                                                         <div class="col-lg-12 mb-3">
                                                            <div class="form-floating">
                                                               <input type="number" class="form-control" name="depo"  required id="floatingInput" placeholder="Enter Amount ($)">
                                                               <label for="floatingInput">Enter Amount ($)</label>
                                                            </div>
                                                         </div>
                                                         <div class="col-lg-12 mb-3">
                                                            <div class="form-floating">
                                                               <input type="text" class="form-control" name="ahash"   id="floatingInput" placeholder="Enter Reference (#)">
                                                               <label for="floatingInput">Enter Reference (#)</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                   <button type="submit" name="sub-depo" class="btn btn-primary">Send Funds</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>
                  <!-- end tab pane -->
                  <!-- end tab pane -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection