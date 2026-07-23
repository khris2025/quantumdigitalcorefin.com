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
                  {{-- <h4 class="mb-sm-0 font-size-18">Pending Loan Request</h4> --}}
                  <div class="page-title-right">
                     {{-- <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Pending Loan Request</li>
                     </ol> --}}
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending Grant Request</h4>
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
                                        <th>name</th>
                                        <th>email</th>
                                        <th>Transaction ID</th>
                                        <th>amount</th>
                                        <th>Grant Type</th>
                                        <th>Grant purpose</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($grant_request->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">No pending Loan request found.</td>
                                        </tr>
                                        @else
                                        @foreach ($grant_request as $grant_requests)
                                        <tr>
                                            <td>{{ $grant_requests->id }}</td>
                                            <td>{{ $grant_requests->created_at->format('F j, Y') }}</td>
                                            <td>{{ $grant_requests->fullname }}</td>
                                            <td>{{ $grant_requests->email }}</td>
                                            <td>{{ $grant_requests->transid }}</td>
                                            <td>${{ number_format($grant_requests->amount) }}</td>
                                            <td>{{ $grant_requests->grant_type }}</td>
                                            <td>
                                                <span class="short-text">
                                                   {{ \Illuminate\Support\Str::limit($grant_requests->grant_purpose, 20) }}
                                                   @if(strlen($grant_requests->grant_purpose) > 20)
                                                      <a href="javascript:void(0);" onclick="toggleGrantText(this)">Read more</a>
                                                   @endif
                                                </span>
                                                <span class="full-text" style="display: none;">
                                                   {{ $grant_requests->grant_purpose }}
                                                   <a href="javascript:void(0);" onclick="toggleGrantText(this)">Show less</a>
                                                </span>
                                             </td>  
                                            <td>{{ $grant_requests->status }}</td>
                                            <td><a href="{{ route('grant_action', ['id' => $grant_requests->id, 'action' => 'confirm']) }}" class="btn btn-rounded btn-success">Approve</a>

                                                <a href="{{ route('grant_action', ['id' => $grant_requests->id, 'action' => 'decline']) }}" class="btn btn-rounded btn-danger">Decline</a>

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
@endsection