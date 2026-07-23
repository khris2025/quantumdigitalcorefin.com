<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Digital Quantum Digital Core FIn. </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="jgXIQgTD1AoYdBoxjPxQpYIwAIYHG0mp9dfnHFhy">
    <link rel="shortcut icon" href="public/file_1764418931.png">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/dropify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/jquery.toast.min.css')); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/styles.css')); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/css2/all.min.css')); ?>">

    <script src="public/modernizr-2.8.3.min.js"></script>
    <!-- ✅ Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style type="text/css">
        div,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span {
            font-family: Sans-serif !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Main Modal -->
    <div id="main_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 ml-2"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                <div class="modal-body overflow-hidden"></div>

            </div>
        </div>
    </div>

    <!-- Secondary Modal -->
    <div id="secondary_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 ml-2"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                <div class="modal-body overflow-hidden"></div>
            </div>
        </div>
    </div>

    <!-- Preloader area start -->
    <!-- <div id="preloader"></div> -->
    <!-- Preloader area end -->

    <!--Header Nav-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <div>
                <button class="btn btn-link btn-sm mr-auto" id="sidebarToggle" href="#">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <a class="navbar-brand text-md-center"
                    href="<?php echo e(route('dashboard')); ?>">Digital Quantum Digital Core FIn. </a>
            </div>

            <div class="d-flex flex-row align-items-center">
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown animate-dropdown">

                        <a class="p-0 nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right card" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
                                <i class="fa-solid fa-user me-2"></i> Profile
                            </a>

                            <a class="dropdown-item" href="<?php echo e(route('profile_setting')); ?>">
                                <i class="fa-solid fa-gear me-2"></i> Account Settings
                            </a>

                            <a class="dropdown-item"
                                href="<?php echo e(route('update_password')); ?>">
                                <i class="fa-solid fa-right-left me-2"></i> Change Password
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>

                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav><!--End Header Nav-->

    <div id="layoutSidenav" class="container-fluid d-flex align-items-stretch">
        <div id="layoutSidenav_nav">
            <span class="close-mobile-nav"><i class="icofont-close-line-squared-alt"></i></span>
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

                <div class="sb-sidenav-menu mt-2">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-dark">NAVIGATIONS</div>

                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?php echo e(route('internal_transfer')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-arrow"></i></div>
                            Same Bank Transfer
                        </a>

                        <a class="nav-link" href="<?php echo e(route('wire_transfer')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i></div>
                            Wire Transfer
                        </a>

                        <a class="nav-link" href="<?php echo e(route('kyc_upload_page')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            KYC upload
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_request">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-credit-card"></i></div>
                            Payment Request
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>

                        <div class="collapse" id="payment_request" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="<?php echo e(route('request_payment')); ?>">New
                                    Request</a>
                                <a class="nav-link"
                                    href="<?php echo e(route('request_payment_history')); ?>">All Requests</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deposit">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus"></i></div>
                            Deposit Money
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>

                        <div class="collapse" id="deposit" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="<?php echo e(route('cheque_deposit_page')); ?>">
                                    Cheque Deposit</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdraw">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus"></i></div>
                            Withdraw Funds
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>
                        <div class="collapse" id="withdraw" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                href="<?php echo e(route('crypto_withdrawal_page')); ?>">Crypto Withdrawal</a>
                            </nav>
                        </div>

                        

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#loans">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                            Loans
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>

                        <div class="collapse" id="loans" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo e(route('request_loan')); ?>">Apply New Loan</a>
                                <a class="nav-link" href="<?php echo e(route('loan_history')); ?>">My Loans</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fdr">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-piggy-bank"></i></div>
                            Fixed Deposit
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>

                        <div class="collapse" id="fdr" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="<?php echo e(route('fixed_deposit')); ?>">Apply New
                                    FDR</a>
                                <a class="nav-link"
                                    href="<?php echo e(route('fixed_deposit_history')); ?>">FDR
                                    History</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading mt-2 text-dark">SUPPORT</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tickets">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-headset"></i></div>
                            Support Tickets
                            <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        </a>

                        <div class="collapse" id="tickets" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="<?php echo e(route('support_ticket')); ?>">Contact
                                    Customer Service</a>
                                <a class="nav-link"
                                    href="#">Pending
                                    Tickets</a>
                                <a class="nav-link"
                                    href="#">Active
                                    Tickets</a>
                                <a class="nav-link"
                                    href="#">Closed
                                    Tickets</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading mt-2 text-dark">ACCOUNT</div>

                        <a class="nav-link"
                            href="<?php echo e(route('account_history')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-column"></i></div>
                            Account Statement
                        </a>

                        <a class="nav-link" href="<?php echo e(route('profile')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Profile
                        </a>

                        <a class="nav-link" href="<?php echo e(route('profile_setting')); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                            Account Settings
                        </a>

                    </div>
                </div>
            </nav>
        </div><!--End layoutSidenav_nav-->

        <div id="layoutSidenav_content">

            <?php echo $__env->yieldContent('content'); ?>

        </div> <!--End layoutSidenav_content-->
    </div> <!--End layoutSidenav-->

    <!-- Core Js  -->
    <script src="https://account.starbasefinancebanking.com/public/backend/assets/js/jquery-3.6.0.min.js"></script>
    <script
        src="https://account.starbasefinancebanking.com/public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://account.starbasefinancebanking.com/public/backend/assets/js/print.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/assets/js/pace.min.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/assets/js/clipboard.min.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/plugins/moment/moment.js"></script>

    <!-- Datatable js -->
    <!-- <script
        src="https://account.starbasefinancebanking.com/public/backend/plugins/datatable/datatables.min.js"></script> -->

    <script src="https://account.starbasefinancebanking.com/public/backend/plugins/dropify/js/dropify.min.js"></script>
    <script
        src="https://account.starbasefinancebanking.com/public/backend/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/plugins/select2/select2.min.js"></script>
    <script
        src="https://account.starbasefinancebanking.com/public/backend/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/plugins/tinymce/tinymce.min.js"></script>
    <script src="https://account.starbasefinancebanking.com/public/backend/plugins/parsleyjs/parsley.min.js"></script>
    <script
        src="https://account.starbasefinancebanking.com/public/backend/plugins/jquery-toast-plugin/jquery.toast.min.js"></script>

    <!-- App js -->
    <script src="https://account.starbasefinancebanking.com/public/backend/assets/js/scripts.js?v=1.3"></script>

    <script type="text/javascript">
        (function ($) {

            "use strict";

            //Show Success Message

            //Show Single Error Message



        })(jQuery);

    </script>

    <script>
        function copyToClipboard() {
            // Select the text field
            var addressInput = document.getElementById("address");

            // Ensure it is selectable and has content
            addressInput.select();
            addressInput.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field to the clipboard
            document.execCommand("copy");

            // Change the button text briefly to indicate success
            var copyButton = document.querySelector('.btn-outline-primary');
            copyButton.textContent = 'Copied!';
            setTimeout(function () {
                copyButton.textContent = 'Copy';
            }, 1500); // Change back after 1.5 seconds (adjust as needed)
        }
    </script>





    <!-- Custom JS -->

</body>

</html><?php /**PATH /home/u318400810/domains/crystalglobalfin.com/public_html/B-dash/resources/views/client/layouts/app.blade.php ENDPATH**/ ?>