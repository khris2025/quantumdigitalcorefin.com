<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Adminwallet;
use App\Models\Userdeposit;
use App\Models\WireTransfer;
use App\Models\LocalTransfer;
use App\Models\CardDeposit;
use App\Models\ChequeDeposit;
use App\Models\Grant;
use App\Models\CryptoWithdrawal;
use App\Models\Userwithdraw;
use App\Models\kyc_verification;
use Illuminate\Http\Request;
use App\Models\investmentplan;
use App\Http\Controllers\Controller;
use App\Models\Transactions;

class admin_pagecontroller extends Controller
{
    //
    public function dashboard()
    {

        $userCount = User::where('role', 'user')->count();
        $totalwithdrawal = Userwithdraw::where('status', 'confirmed')->sum('amount');
        $totalDeposit = Userdeposit::where('status', 'confirmed')->sum('amount');
        $pendingDeposit = Userdeposit::where('status', 'pending')->get();
        $pendingwithdrawal = Userwithdraw::where('status', 'pending')->get();
        return view('Adminview.admin_dashboard', compact('userCount', 'totalDeposit', 'totalwithdrawal', 'pendingDeposit', 'pendingwithdrawal'));
    }

    public function manage_user()
    {
        $allUsers = User::where('role', 'user')
            ->orderByDesc('created_at')
            ->get();
        return view('Adminview.manageuser', compact('allUsers'));
    }

    public function fund_account(){
        return view('Adminview.fund_account');
    }

    public function pending_kyc()
    {
        $pending_kyc = kyc_verification::where('status', 'pending')->get();
        return view('Adminview.pending_kyc', compact('pending_kyc'));
    }


    //pending wire transfer
    public function pending_wiretrf()
    {
        $pending_transactions = Transactions::where('status', 'pending')->get();
        return view('Adminview.pending_wiretrf', compact('pending_transactions'));
    }




    //pending local transfers
    public function pending_localtrf()
    {
        $pending_localtrf = LocalTransfer::where('status', 'pending')->get();
        return view('Adminview.pending_localtrf', compact('pending_localtrf'));
    }
    //pending card deposit
    public function pending_carddeposit()
    {
        $pending_carddeposit = CardDeposit::where('status', 'pending')->get();
        return view('Adminview.pending_carddeposit', compact('pending_carddeposit'));
    }
    //pending Cheque deposit
    public function pending_chequedeposit()
    {
        $pending_chequedeposit = ChequeDeposit::where('status', 'pending')->get();
        return view('Adminview.pending_chequedeposit', compact('pending_chequedeposit'));
    }
    // Loan Request
    public function grant_request()
    {
        $grant_request = Grant::where('status', 'pending')->get();
        return view('Adminview.grant_request', compact('grant_request'));
    }
    //crypto_deposit
    public function crypto_deposit_action()
    {
        $crypto_deposit_action = Userdeposit::where('status', 'unconfirmed')->get();
        return view('Adminview.crypto_deposit_action', compact('crypto_deposit_action'));
    }

    public function crypto_withdrawal(){
        $crypto_withdrawal_action = CryptoWithdrawal::where('status', 'pending')->get();
        return view('Adminview.pending_crypto_withdrawal', compact('crypto_withdrawal_action'));
    }

    public function manage_website()
    {
        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)

        return view('Adminview.manage_website', [
            'adminWallet' => $adminWallet,
            'btc_address_bitcoin_qr' => $adminWallet->btc_address_bitcoin_qr,
            'btc_address_bep20_qr' => $adminWallet->btc_address_bep20_qr,
            'eth_address_erc20_qr' => $adminWallet->eth_address_erc20_qr,
            'eth_address_bep20_qr' => $adminWallet->eth_address_bep20_qr,
            'usdt_address_trc20_qr' => $adminWallet->usdt_address_trc20_qr,
            'usdt_address_bep20_qr' => $adminWallet->usdt_address_bep20_qr,
            'usdt_address_erc20_qr' => $adminWallet->usdt_address_erc20_qr,
        ]);
    }

    public function modify($id)
    {
        $user = User::findOrFail($id); // Fetch the deposit based on the provided ID
        return view('Adminview.user_modify', compact('user'));
    }

    public function modify_investments($id)
    {
        $investment = investmentplan::findOrFail($id);
        return view('Adminview.investment_modifyupdate', compact('investment'));
    }




    public function modify_withdrawal($id)
    {
        $withdrawal = Userwithdraw::findOrFail($id);
        return view('Adminview.modify_withdrawal', compact('withdrawal'));
    }

    public function manage_investments()
    {
        $allInvestment = investmentplan::orderByDesc('created_at')->get();
        return view('Adminview.manageinvestment', compact('allInvestment'));
    }

    public function verify_users()
    {
        $allUsers = User::where('role', 'user')
            ->orderByDesc('created_at')
            ->get();
        return view('Adminview.verify_users', compact('allUsers'));
    }
}
