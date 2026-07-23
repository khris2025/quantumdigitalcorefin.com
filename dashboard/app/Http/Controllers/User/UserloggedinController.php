<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Userdeposit;
use App\Models\Userwithdraw;
use Illuminate\Http\Request;
use App\Models\investmentplan;
use App\Models\kyc_verification;
use App\Models\WireTransfer;
use App\Models\LocalTransfer;
use App\Models\CardDeposit;
use App\Models\ChequeDeposit;
use App\Models\Loan;
use App\Models\CryptoWithdrawal;
use App\Models\Grant;
use App\Models\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserloggedinController extends Controller
{
    //
    public function dashboard()
    {
        $user = Auth::user(); // Fetch the authenticated user
        $userEmail = $user->email;
        // $pendingDeposit = Userdeposit::where('email', $userEmail)
        //     ->where('status', 'pending')
        //     ->get();
        // $pendingwithdrawal = Userwithdraw::where('email', $userEmail)
        //     ->where('status', 'pending')
        //     ->get();
        // $calculate_invested_amount = investmentplan::where('email', $userEmail)
        //     ->where('status', 'ongoing')
        //     ->sum('amount');
        // $total_amount_withdrawn = Userwithdraw::where('email', $userEmail)
        //     ->where('status', 'success')
        //     ->sum('amount');
        // $total_occurrences_packages = investmentplan::where('email', $userEmail)->count();

        // $active_packages = investmentplan::where('email', $userEmail)
        //     ->where('status', 'ongoing')
        //     ->count();

        $transactions = Transactions::where('email', $userEmail)
            ->orderByDesc('created_at')
            ->get();


        // return view('Userview.dashboard', compact('user', 'pendingDeposit', 'pendingwithdrawal', 'calculate_invested_amount', 'total_amount_withdrawn', 'total_occurrences_packages', 'active_packages'));
        return view('client.dashboard', compact('transactions'));
        }

    public function Investments()
    {
        $user = Auth::user();
        $userEmail = $user->email;
        $pendinginv = investmentplan::where('email', $userEmail)
            ->where(function ($query) {
                $query->where('status', 'ongoing')
                    ->orWhere('status', 'paused');
            })
            ->orderByDesc('created_at')
            ->get();

        $completedinv = investmentplan::where('email', $userEmail)
            ->where('status', 'ended')
            ->orderbyDesc('created_at')
            ->get();
        return view('Userview.investment', compact('pendinginv', 'completedinv'));
    }

    public function deposit(Request $request)
    {
        $user = Auth::user();
        $userEmail = $user->email;
        $completed_deposits = Userdeposit::where('email', $userEmail)
            ->where('status', 'confirmed') // Add this condition
            ->orderBy('id', 'desc')
            ->get();

        $deposits = Userdeposit::where('email', $userEmail)
            ->whereIn('status', ['unconfirmed', 'pending', 'canceled'])
            ->orderBy('id', 'desc')
            ->get();


        return view('Userview.deposit', ['deposits' => $deposits, 'completed_deposits' => $completed_deposits]);
    }




    public function withdrawal(Request $request)
    {
        $userEmail = Auth::user()->email;
        $completed_withdrawals = Userwithdraw::where('email', $userEmail)
            ->where('status', 'success') // Add this condition
            ->orderBy('id', 'desc')
            ->get();

        $withdrawals = Userwithdraw::where('email', $userEmail)
            ->whereIn('status', ['pending', 'declined'])
            ->orderBy('id', 'desc')
            ->get();


        return view('Userview.withdrawal', ['withdrawals' => $withdrawals, 'completed_withdrawals' => $completed_withdrawals]);
    }






    public function referral()
    {
        $user_ref_code = Auth::user()->referral_code;
        $referrals = User::where('referred_by', $user_ref_code)
            ->orderBy('id', 'desc')
            ->get();
        return view('Userview.referral', compact('referrals'));
    }



    public function profile()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    public function profile_setting(){
        $user = Auth::user();
        return view('client.account_settings', compact('user'));
    }

    public function addwallet(Request $request)
    {
        $validatedData = $request->validate([
            'btc_btc' => 'nullable|string',
            'btc_bep20' => 'nullable|string',
            'eth_erc20' => 'nullable|string',
            'eth_bep20' => 'nullable|string',
            'usdt_trc20' => 'nullable|string',
            'usdt_bep20' => 'nullable|string',
            'usdt_erc20' => 'nullable|string',
        ]);
        $user = Auth::user();

        $user->btc_address_btc = $request->input('btc_btc');
        $user->btc_address_bep20 = $request->input('btc_bep20');
        $user->eth_address_erc20 = $request->input('eth_erc20');
        $user->eth_address_bep20 = $request->input('eth_bep20');
        $user->usdt_address_trc20 = $request->input('usdt_trc20');
        $user->usdt_address_bep20 = $request->input('usdt_bep20');
        $user->usdt_address_erc20 = $request->input('usdt_erc20');

        $user->save();
        return redirect()
            ->back()
            ->with('success', 'Addresses updated successfully.');
    }




    public function addto_balance(Request $request)
    {

        $action = $request->input('action');

        switch ($action) {
            case 'profit_to_wallet':
                $request->validate([
                    'profit_amount' => 'required|numeric',
                ]);
                $profit_to_move = $request->input('profit_amount');
                $user = Auth::user();
                $user_profit_balance = $user->profit;
                $user_wallet_balance = $user->walletbalance;

                if ($profit_to_move > $user_profit_balance) {
                    return redirect()
                        ->back()
                        ->withErrors(['profit_transfer_error' => 'Amount inserted is greater or less than profit amount.']);
                } else {
                    //calculate the new profile balance and store it 
                    $updated_profit_balance = $user_profit_balance - $profit_to_move;
                    $user->profit = $updated_profit_balance;
                    $user->save();

                    //add the profit to the walletbalance
                    $updated_wallet_balance = $user_wallet_balance + $profit_to_move;
                    $user->walletbalance = $updated_wallet_balance;
                    $user->save();
                }

                return redirect()->back()->with('success', 'Profits Moved to wallet Balance.');
                break;

            case 'bonus_to_wallet':
                $request->validate([
                    'bonus_amount' => 'required|numeric',
                ]);
                $bonus_to_move = $request->input('bonus_amount');
                $user = Auth::user();
                $user_bonus_balance = $user->refbonus;
                $user_wallet_balance = $user->walletbalance;
                if ($bonus_to_move > $user_bonus_balance) {
                    return redirect()
                        ->back()
                        ->withErrors(['bonus_transfer_error' => 'Amount inserted is greater or less than bonus amount.']);
                } else {
                    //calculate the new profile balance and store it 
                    $updated_bonus_balance = $user_bonus_balance - $bonus_to_move;
                    $user->refbonus = $updated_bonus_balance;
                    $user->save();

                    // Correct
                    $updated_wallet_balance = $user_wallet_balance + $bonus_to_move;
                    $user->walletbalance = $updated_wallet_balance;
                    $user->save();
                }

                return redirect()->back()->with('success', 'bonus Moved to wallet Balance.');

                break;

            default:
                return redirect()->back()->withErrors(['message' => 'Invalid action.']);
                break;
        }
    }

    public function kyc_upload()
    {

        $user = Auth::user();
        $user_email = $user->email;

        $existsInKycTable = kyc_verification::where('email', $user_email)->exists();

        if ($existsInKycTable) {
            // User with the specified email exists in the kyc_verification table
            // You can redirect, show a message, or perform any other actions
            return redirect()->route('kyc_upload_pay')->with('message', 'User exists in the kyc_verification table.');
        } else {
            return view('Userview.kyc_upload');
        }
    }




    public function wire_transfer()
    {
        return view('client.wire_transfer');
    }

    // public function local_transfer()
    // {
    //     return view('Userview.local_transfer');
    // }

    public function internal_transfer()
    {
        return view('client.internal_transfer');
    }

    public function cheque_deposit_page(){
        return view('client.cheque_deposit');
    }

    public function request_payment(){
        return view('client.payment_request');
    }

    public function request_payment_history(){
        return view('client.request_payment_history');
    }

    public function bank_withdrawal(){
        return view('client.bank_withdrawal');
    }

    public function crypto_withdrawal_page(){
        return view('client.crypto_withdrawal');
    }

    public function request_loan(){
        return view('client.request_loans');
    }

    public function loan_history(){
        return view('client.loan_history');
    }

    public function fixed_deposit(){
        return view('client.fixed_deposit');
    }

    public function fixed_deposit_history(){
        return view('client.fixed_deposit_history');
    }

    public function support_ticket(){
        return view('client.support_ticket');
    }

    public function account_history(){
        $user = Auth::user(); // Fetch the authenticated user
        $userEmail = $user->email;

        $transactions = Transactions::where('email', $userEmail)
            ->orderByDesc('created_at')
            ->get();

        return view('client.account_history', compact('transactions'));
    }

    public function kyc_upload_page(){
        return view('client.kyc');
    }

    public function update_password(){
        return view('client.update_password');
    }



    public function Buy_crypto()
    {
        return view('Userview.Buy_crypto');
    }
    public function grants()
    {
        return view('Userview.grants');
    }
    public function request_money()
    {
        return view('Userview.request_money');
    }
    public function card_deposit()
    {
        return view('Userview.card_deposit');
    }
    public function transactions(){
        return view('Userview.transactions');
    }
    
    public function crypto_deposit()
    {
        $user = Auth::user();
        $userEmail = $user->email;
        $deposits = Userdeposit::where('email', $userEmail)
            ->whereIn('status', ['unconfirmed', 'pending', 'canceled'])
            ->orderBy('id', 'desc')
            ->get();
        return view('Userview.crypto_deposit', compact('deposits'));
    }
    public function cheque_deposit()
    {
        return view('Userview.cheque_deposit');
    }
    public function pending_transaction()
    {
        $user = Auth::user(); // Fetch the authenticated user
        $userEmail = $user->email;
        $pendingWire = WireTransfer::where('senders_email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $pendingCryptoWithdrawal = CryptoWithdrawal::where('users_email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $pendingLocaltrf = LocalTransfer::where('senders_email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $pendingCarddeposit = CardDeposit::where('email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $pendingchequedeposit = ChequeDeposit::where('email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $pendingLoanrequest = Loan::where('email', $userEmail)
            ->where('status', 'pending')
            ->get();
        $deposits = Userdeposit::where('email', $userEmail)
            ->whereIn('status', ['unconfirmed', 'pending', 'canceled'])
            ->orderBy('id', 'desc')
            ->get();
        $pendinggrantrequest = Grant::where('email', $userEmail)
            ->orderBy('id', 'desc')
            ->get();
        return view('Userview.pending_transaction', compact('pendingWire', 'pendingLocaltrf', 'pendingCarddeposit', 'pendingchequedeposit', 'pendingLoanrequest', 'deposits', 'pendinggrantrequest', 'pendingCryptoWithdrawal'));
    }
}
