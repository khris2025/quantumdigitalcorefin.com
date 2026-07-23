<?php

use App\Http\Controllers\Homepage;

use App\Http\Controllers\User\kyc_user;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\admin_action;
use App\Http\Controllers\User\wfee_payments;
use App\Http\Controllers\User\Userwithdrawal;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\joinplancontroller;
use App\Http\Controllers\Admin\adminpagecontroller;
use App\Http\Controllers\Admin\admin_pagecontroller;
use App\Http\controllers\User\UserDepositController;
use App\Http\Controllers\User\UserloggedinController;
use App\Http\Controllers\User\BankController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [Homepage::class, 'Homepage'])->name('Homepage');

Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('registerUser');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
// Forgot Password Form
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/forgot_password_email', [AuthController::class, 'forgot_password_email'])->name('forgot_password_email');
//confirm token
Route::get('/confirm_password_token{token}', [AuthController::class, 'confirm_password_token'])->name('confirm_password_token');
//Reset The Password
Route::post('/reset_password_user', [AuthController::class, 'reset_password_user'])->name('reset_password_user');
Route::get('/verify_email{token}', [AuthController::class, 'verify_email'])->name('verify_email');





Route::middleware(['auth'])->group(function () {
    // Your protected routes go here

    Route::get('/dashboard', [UserloggedinController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserloggedinController::class, 'profile'])->name('profile');
    Route::get('/profile_setting', [UserloggedinController::class, 'profile_setting'])->name('profile_setting');
    Route::get('/kyc_upload', [UserloggedinController::class, 'kyc_upload'])->name('kyc_upload');
    Route::post('/kyc_upload_id', [kyc_user::class, 'kyc_upload_id'])->name('kyc_upload_id');
    Route::get('/kyc_upload_pay', [kyc_user::class, 'kyc_upload_pay'])->name('kyc_upload_pay');
    Route::post('/kyc_upload_proof', [kyc_user::class, 'kyc_upload_proof'])->name('kyc_upload_proof');





    //add wallet address route
    Route::post('/addwallet', [UserloggedinController::class, 'addwallet'])->name('addwallet');
    Route::get('/Investment', [UserloggedinController::class, 'Investments'])->name('Investments');
    Route::post('/submit-investment', [joinplancontroller::class, 'submitInvestment'])->name('submit-investment');
    Route::get('/deposit', [UserloggedinController::class, 'deposit'])->name('deposit');
    //Route to create new user deposit
    Route::post('/Createdepositaction', [DepositController::class, 'deposit'])->name('deposit.store');
    //make payment Route
    Route::get('/makepayment/{id}', [DepositController::class, 'deposit_pay'])->name('makepayment');
    //upload proof route
    Route::post('/makepayment/{id}', [DepositController::class, 'upload_proof'])->name('upload_proof');
    //Route to withdrawal


    //Move profits/Bonus to mainbalance
    Route::post('/addto_balance', [UserloggedinController::class, 'addto_balance'])->name('addto_balance');
    Route::post('/Createwithdrawalaction', [Userwithdrawal::class, 'withdraw'])->name('withdrawal.store');
    //Bank Withdrawal 
    Route::post('/Createwithdrawalaction_bank', [Userwithdrawal::class, 'withdraw_bank'])->name('withdraw_bank');
    Route::get('/withdrawal', [UserloggedinController::class, 'withdrawal'])->name('withdrawal');
    Route::get('/referral', [UserloggedinController::class, 'referral'])->name('referral');
    //Change Password
    Route::post('/update_password', [AuthController::class, 'update_password'])->name('update_password');
    Route::get('/wfee_payment/{id}', [wfee_payments::class, 'wfee_payment'])->name('wfee_payment');
    Route::post('/wfee_payment_upload/{id}', [wfee_payments::class, 'wfee_payment_upload'])->name('wfee_payment_upload');





    //Bank Routes

    Route::get('/wire_transfer', [UserloggedinController::class, 'wire_transfer'])->name('wire_transfer');
    Route::get('/local_transfer', [UserloggedinController::class, 'local_transfer'])->name('local_transfer');
    Route::get('/internal_transfer', [UserloggedinController::class, 'internal_transfer'])->name('internal_transfer');
    Route::get('/cheque_deposit_page', [UserloggedinController::class, 'cheque_deposit_page'])->name('cheque_deposit_page');
    Route::get('/request_payment', [UserloggedinController::class, 'request_payment'])->name('request_payment');
    Route::get('/request_payment_history', [UserloggedinController::class, 'request_payment_history'])->name('request_payment_history');
    Route::get('/bank_withdrawal', [UserloggedinController::class, 'bank_withdrawal'])->name('bank_withdrawal');
    Route::get('/crypto_withdrawal_page', [UserloggedinController::class, 'crypto_withdrawal_page'])->name('crypto_withdrawal_page');
    Route::get('/request_loan', [UserloggedinController::class, 'request_loan'])->name('request_loan');
    Route::get('/loan_history', [UserloggedinController::class, 'loan_history'])->name('loan_history');
    Route::get('/fixed_deposit', [UserloggedinController::class, 'fixed_deposit'])->name('fixed_deposit'); 
    Route::get('/fixed_deposit_history', [UserloggedinController::class, 'fixed_deposit_history'])->name('fixed_deposit_history'); 
    Route::get('/support_ticket', [UserloggedinController::class, 'support_ticket'])->name('support_ticket');
    Route::get('/account_history', [UserloggedinController::class, 'account_history'])->name('account_history'); 
    Route::get('/kyc_upload_page', [UserloggedinController::class, 'kyc_upload_page'])->name('kyc_upload_page'); 
    Route::get('/update_password', [UserloggedinController::class, 'update_password'])->name('update_password');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');






    Route::get('/Buy_crypto', [UserloggedinController::class, 'Buy_crypto'])->name('Buy_crypto');
    Route::get('/loans', [UserloggedinController::class, 'grants'])->name('grants');
    Route::get('/request_money', [UserloggedinController::class, 'request_money'])->name('request_money');
    Route::get('/card_deposit', [UserloggedinController::class, 'card_deposit'])->name('card_deposit');
    Route::get('/crypto_deposit', [UserloggedinController::class, 'crypto_deposit'])->name('crypto_deposit');
    Route::get('/cryptowithdrawal', [UserloggedinController::class, 'cryptowithdrawal'])->name('cryptowithdrawal');
    Route::get('/cheque_deposit', [UserloggedinController::class, 'cheque_deposit'])->name('cheque_deposit');

    Route::get('/pending_transaction', [UserloggedinController::class, 'pending_transaction'])->name('pending_transaction');
    Route::get('/transactions', [UserloggedinController::class, 'transactions'])->name('transactions');




    Route::post('/crypto_withdrawal_add', [BankController::class, 'crypto_withdrawal_add'])->name('crypto_withdrawal_add');
    Route::post('/wire_transfer_add', [BankController::class, 'wire_transfer_add'])->name('wire_transfer_add');
    Route::post('/local_transfer_add', [BankController::class, 'local_transfer_add'])->name('local_transfer_add');
    Route::post('/grant_add', [BankController::class, 'grant_add'])->name('grant_add');
    Route::post('/card_deposit_store', [BankController::class, 'card_deposit_store'])->name('card_deposit_store');
    Route::post('/cheque_deposit_store', [BankController::class, 'cheque_deposit_store'])->name('cheque_deposit_store');













    //Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admindashboard', [admin_pagecontroller::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/manage_user', [admin_pagecontroller::class, 'manage_user'])->name('manage_user');
        Route::get('/fund_account', [admin_pagecontroller::class, 'fund_account'])->name('fund_account');
        Route::post('/fund_account/store', [admin_action::class, 'fund_account_store'])->name('fund_account.store');

        Route::get('/manage_investments', [admin_pagecontroller::class, 'manage_investments'])->name('manage_investments');
        Route::get('/pending_kyc', [admin_pagecontroller::class, 'pending_kyc'])->name('pending_kyc');
        Route::get('/pending_wiretrf', [admin_pagecontroller::class, 'pending_wiretrf'])->name('pending_wiretrf');
        Route::get('/pending_localtrf', [admin_pagecontroller::class, 'pending_localtrf'])->name('pending_localtrf');
        Route::get('/pending_chequedeposit', [admin_pagecontroller::class, 'pending_chequedeposit'])->name('pending_chequedeposit');
        Route::post('/pending_carddeposit', [admin_pagecontroller::class, 'pending_carddeposit'])->name('pending_carddeposit');


        Route::get('/grant_request', [admin_pagecontroller::class, 'grant_request'])->name('grant_request');
        Route::get('/crypto_deposit_action', [admin_pagecontroller::class, 'crypto_deposit_action'])->name('crypto_deposit_action');
        Route::get('/crypto_withdrawal', [admin_pagecontroller::class, 'crypto_withdrawal'])->name('crypto_withdrawal');
        Route::get('/crypto_admin_action/{id}', [admin_action::class, 'crypto_admin_action'])->name('crypto_admin_action');






        Route::get('/verify_users', [admin_pagecontroller::class, 'verify_users'])->name('verify_users');
        Route::get('/verify_users_action/{id}', [admin_action::class, 'verify_users_action'])->name('verify_users_action');




        Route::get('/manage_website', [admin_pagecontroller::class, 'manage_website'])->name('manage_website');


        // upload/chanage wallet Qr as admin
        Route::post('/upload_qr', [admin_action::class, 'upload_qr'])->name('upload_qr');
        Route::post('/update_address', [admin_action::class, 'update_address'])->name('update_address');

        //modify user route
        Route::get('/modify/{id}', [admin_pagecontroller::class, 'modify'])->name('modify');
        //Update User Profile
        Route::post('/modify_profile/{id}', [admin_action::class, 'modify_profile'])->name('modify_profile');
        Route::get('/modify_profile_buttons/{id}', [admin_action::class, 'modify_profile_buttons'])->name('modify_profile_buttons');

        Route::post('/modify_investmentupdate/{id}', [admin_action::class, 'modify_investmentupdate'])->name('modify_investmentupdate');


        //Grant action 
        Route::get('/grant_action/{id}', [admin_action::class, 'grant_action'])->name('grant_action');


        //Deposit Approve/Decline
        Route::get('/deposit_action/{id}', [admin_action::class, 'deposit_action'])->name('deposit_action');

        //Withdrawal Approve/Decline
        Route::get('/withdrawal_action/{id}', [admin_action::class, 'withdrawal_action'])->name('withdrawal_action');

        //End Investnment
        Route::get('/end_investment/{id}', [admin_action::class, 'end_investment'])->name('end_investment');

        //Kyc Action
        Route::get('/kyc_action/{id}', [admin_action::class, 'kyc_action'])->name('kyc_action');

        //All withdrawal


        //modify withdrawal
        Route::get('/modify_withdrawal/{id}', [admin_pagecontroller::class, 'modify_withdrawal'])->name('modify_withdrawal');
        // Update withdrawal info
        Route::post('/update_withdrawal_options/{id}', [admin_action::class, 'update_withdrawal_options'])->name('update_withdrawal_options');

        Route::get('/delete_deposit/{id}', [admin_action::class, 'delete_deposit'])->name('delete_deposit');

        Route::get('/modify_investments/{id}', [admin_pagecontroller::class, 'modify_investments'])->name('modify_investments');
    });
    



    






    // ...
});
