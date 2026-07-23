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
                  <h4 class="mb-sm-0 font-size-18">Profile</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                                    <h5 class="font-size-16 mb-1">{{ $user->fullname }}</h5>
                                    <p class="text-muted font-size-13">{{ $user->email }}</p>
                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                       <div>
                                          <a class="btn btn-danger waves-effect btn-label waves-light" href="{{ route('modify_profile_buttons', ['action' => 'delete', 'id' => $user->id]) }}" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bx bx-trash-alt label-icon"></i>Delete Account</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="{{ route('modify_profile_buttons', ['action' => 'verify-kyc', 'id' => $user->id]) }}"><i class="bx bx-user-check label-icon"></i>Verify KYC</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="{{ route('modify_profile_buttons', ['action' => 'verify-email', 'id' => $user->id]) }}"><i class="bx bx-user-check label-icon"></i>Verify Email</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="{{ route('modify_profile_buttons', ['action' => 'unverify-kyc', 'id' => $user->id]) }}"><i class="bx bx-user-check label-icon"></i>Unverify KYC</a>
                                    </div>                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">Profile</a>
                        </li>
                        {{-- <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab" aria-selected="false">Wallet</a>
                        </li> --}}
                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#kyc" role="tab" aria-selected="false">Kyc Amount</a>
                        </li>
                     </ul>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
               <div class="tab-content">
                  <div class="tab-pane active" id="overview" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Profile</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <div class="pb-3">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div>
                                          <form action="{{ route('modify_profile', ['id' => $user->id]) }}" method="post">
                                             @csrf
                                             <input type="hidden" name="form_type" value="modify_userdata">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Balance - checking</label>
                                                      <input type="number" class="form-control" id="formrow-email-input" name="accbalance_checking" value="{{ $user->accbalance_checking }}" step="0.01" min="0"/>
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Balance - savings</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" name="accbalance_savings" value="{{ $user->accbalance_savings }}" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Number checking</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" name="" value="{{ $user->account_number_checking }}" disabled>
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Number savings</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" name="" value="{{ $user->account_number_savings }}" disabled>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">First Name</label>
                                                      <input type="text" class="form-control" id="formrow-firstname-input" disabled value="{{ $user->fullname }}" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Email</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" disabled value="{{ $user->email }}" disabled>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Gender</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="{{ $user->gender }}" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Country</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" disabled value="{{ $user->country }}" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Address</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="{{ $user->address }}" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" disabled value="{{ $user->phone_number }}" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                         <label class="form-label text-success" for="account_status">Account Status</label>
                                                         <select class="form-control" id="account_status" name="account_status" required>
                                                            <option value="ACTIVE" {{ $user->account_status === 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                                                            <option value="RESTRICTED" {{ $user->account_status === 'RESTRICTED' ? 'selected' : '' }}>RESTRICTED</option>
                                                         </select>
                                                   </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Account Number</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input"  value="{{ $user->account_number }}" >
                                                   </div>
                                                </div> --}}
                                             </div>

                                             </div>



                                             <!-- Account Status Dropdown -->
                                             
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