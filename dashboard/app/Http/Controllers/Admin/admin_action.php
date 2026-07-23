<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Adminwallet;
use App\Models\Userdeposit;
use App\Models\Userwithdraw;
use Illuminate\Http\Request;
use App\Models\investmentplan;
use App\Models\kyc_verification;
use App\Models\Grant;
use App\Models\WireTransfer;
use App\Models\CryptoWithdrawal;
use App\Models\Transactions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class admin_action extends Controller
{
    //
    public function upload_qr(Request $request)
    {
        // Validate the uploaded image (you can add more validation rules as needed)
        $validatedData = $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif', // Example validation rules
        ]);

        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)

        $uploadedImage = $request->file('qr_code');
        // Generate a unique filename for the uploaded image
        $filename = time() . '_' . $uploadedImage->getClientOriginalName();
        $imagePath = $uploadedImage->storeAs('qr_images', $filename, 'public');

        $formType = $request->input('form_type');
        if ($formType === 'btc_address_bitcoin_qr') {
            // Update BTC QR data in the database
            $adminWallet->btc_address_bitcoin_qr = $filename;
        } elseif ($formType === 'btc_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->btc_address_bep20_qr = $filename;
        } elseif ($formType === 'eth_address_erc20_qr') {
            // Update ETH QR data in the database
            $adminWallet->eth_address_erc20_qr = $filename;
        } elseif ($formType === 'eth_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->eth_address_bep20_qr = $filename;
        } elseif ($formType === 'usdt_address_trc20_qr') {
            // Update ETH QR data in the database
            $adminWallet->usdt_address_trc20_qr = $filename;
        } elseif ($formType === 'usdt_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->usdt_address_bep20_qr = $filename;
        } elseif ($formType === 'usdt_address_erc20_qr') {
            // Update USDT QR data in the database
            $adminWallet->usdt_address_erc20_qr = $filename;
        }

        $adminWallet->save();

        return redirect()
            ->back()
            ->with('success', 'QR Code uploaded successfully.');
    }


    public function update_address(Request $request)
    {
        $validatedData = $request->validate([
            'btc_address_bitcoin' => 'required|string',
            'btc_address_bep20' => 'required|string',
            'eth_address_erc20' => 'required|string',
            'eth_address_bep20' => 'required|string',
            'usdt_address_trc20' => 'required|string',
            'usdt_address_bep20' => 'required|string',
            'usdt_address_erc20' => 'required|string',
        ]);

        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)

        // Update the fields with the values from the form
        $adminWallet->btc_address_bitcoin = $request->input('btc_address_bitcoin');
        $adminWallet->btc_address_bep20 = $request->input('btc_address_bep20');
        $adminWallet->eth_address_erc20 = $request->input('eth_address_erc20');
        $adminWallet->eth_address_bep20 = $request->input('eth_address_bep20');
        $adminWallet->usdt_address_trc20 = $request->input('usdt_address_trc20');
        $adminWallet->usdt_address_bep20 = $request->input('usdt_address_bep20');
        $adminWallet->usdt_address_erc20 = $request->input('usdt_address_erc20');

        $adminWallet->save();

        return redirect()
            ->back()
            ->with('success', 'Addresses updated successfully.');
    }

    public function modify_profile(Request $request, $id)
    {
        $validatedData = $request->validate([
            'accbalance_checking' => 'sometimes|required|numeric',
            'accbalance_savings' => 'sometimes|required|numeric',
            'account_status' => 'sometimes|required|string',
        ]);



        $user = User::findOrFail($id); // Fetch the user based on the provided ID
        $formType = $request->input('form_type');
        if ($formType == 'kyc_update') {
            $user->kyc_amount = $request->input('kyc_amount');
            $user->save();
        } elseif ($formType == 'modify_userdata') {

            $user->accbalance_checking = $request->input('accbalance_checking');
            $user->accbalance_savings = $request->input('accbalance_savings');
            $user->account_status = $request->input('account_status');

            $user->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }



    public function modify_investmentupdate(Request $request, $id)
    {

        $validatedData = $request->validate([
            // 'profits' => 'sometimes|required|numeric',
            // 'amount' => 'sometimes|required|numeric',
            // 'status_select' => 'sometimes|required',
            // 'withdrawal_date' => 'sometimes|required|date',
            'investedinwhat' => 'sometimes|required|string',

        ]);




        $investment = investmentplan::findOrFail($id); // Fetch the user based on the provided ID







        // $investment->profit = $request->input('profits');
        // $investment->amount = $request->input('amount');
        // $investment->status = $request->input('status_select');
        // $investment->Withdrawaldate = $request->input('withdrawal_date');
        // $investment->profit = $request->input('profits');
        $investment->inv_in = $request->input('investedinwhat');




        $investment->save();

        return redirect()
            ->back()
            ->with('success', 'Investment updated successfully.');
    }



    public function modify_profile_buttons(Request $request, $id)
    {
        $action = $request->query('action');
        $user = User::findOrFail($id); // Fetch the user based on the provided ID



        switch ($action) {
            case 'delete':
                // Handle delete action
                $user->delete();
                return redirect()->route('admin.manageuser')->with('success', 'User deleted successfully.');
                break;

            case 'access':
                // Handle access action
                Auth::login($user);

                // Redirect the user to their dashboard or any other desired page
                return redirect()->route('dashboard')->with('success', 'Login successful!');
                break;

            case 'verify-kyc':
                // Handle verify KYC action
                $user->kyc_verify = 'yes';
                $user->save();
                return redirect()->back()->with('success', 'User kyc successfully verified.');
                break;

            case 'verify-email':
                // Handle verify email action
                $user->email_verify = 'yes';
                $user->save();
                return redirect()->back()->with('success', 'User Email successfully verified.');
                break;

            case 'unverify-kyc':
                // Handle unverify KYC action
                $user->kyc_verify = 'no';
                $user->save();
                return redirect()->back()->with('success', 'User kyc successfully unverified.');
                break;

            default:
                // Handle unknown action or redirect back
                return redirect()->back()->withErrors(['message' => 'Unknown action.']);
        }

        // Perform the desired action and return a response
    }

    public function grant_action(Request $request, $id){
        $action = $request->query('action');
        $grant = Grant::findOrFail($id); // Fetch the user based on the provided ID
        $useremail = $grant->email;
        $user = User::where('email', $useremail)->first();
        $grant_amount = $grant->amount;

        switch ($action) {
            case 'confirm':
                $grant->status = 'Approved';
                $grant->save();
                $user->accbalance += $grant_amount;
                $user->save();


                //send Mail


                 // Send approval mail
                Mail::send('emails.grant_approved', ['user' => $user, 'grant_amount' => $grant_amount], function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Your Grant Has Been Approved');
                });


                return redirect()->back()->with('success', 'Grant Approved.');
                break;
                break;
            case 'decline':
                $grant->status = 'Declined';
                $grant->save();


                //send Mail


                Mail::send('emails.grant_declined', ['user' => $user], function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Your Grant Request Has Been Declined');
                });

                return redirect()->back()->withErrors(['message' => 'Grant declined.']);
                break;

            default:
                # code...
                break;
        }
    }


    public function deposit_action(Request $request, $id)
    {

        $action = $request->query('action');
        $deposit = Userdeposit::findOrFail($id); // Fetch the user based on the provided ID
        $useremail = $deposit->email;
        $user = User::where('email', $useremail)->first();
        $deposit_amount = $deposit->amount;

        switch ($action) {
            case 'confirm':
                $deposit->status = 'confirmed';
                $deposit->save();
                $user->walletbalance += $deposit_amount;
                $user->save();


                //send Mail


                Mail::send('emails.deposit_confirmed', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Deposit Confirmed');
                });


                return redirect()->back()->with('success', 'Deposit confirmed.');
                break;
                break;
            case 'decline':
                $deposit->status = 'canceled';
                $deposit->save();


                //send Mail


                Mail::send('emails.deposit_declined', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Deposit Error');
                });

                return redirect()->back()->withErrors(['message' => 'deposit declined.']);
                break;

            default:
                # code...
                break;
        }
    }


    public function withdrawal_action(Request $request, $id)
    {

        $action = $request->query('action');
        $withdrawal = Transactions::findOrFail($id); // Fetch the wire transfer record based on the provided ID
        $sendersemail = $withdrawal->email;
        $user = User::where('email', $sendersemail)->first();
        $withdrawal_amount = $withdrawal->amount;
        $account = $withdrawal->account;


        switch ($action) {
            case 'confirm':
                if ($account == "checking") {
                    $user->accbalance_checking -= $withdrawal_amount;
                    $withdrawal->status = 'approved';
                    $withdrawal->save();
                    $user->save();
                }elseif ($account == "savings") {
                    $user->accbalance_savings -= $withdrawal_amount;
                    $withdrawal->status = 'approved';
                    $withdrawal->save();
                    $user->save();
                }
                



                //Send Mail
                Mail::send('emails.wire-transfer_confirmed', ['user' => $user, 'withdrawal' => $withdrawal], function ($message) use ($user) {
                    $message->to($user->email)->subject('transfer Confirmed');
                });


                return redirect()->back()->with('success', 'Withdrawal confirmed.');
                break;

            case 'decline':
                $withdrawal->status = 'declined';
                $withdrawal->save();

                Mail::send('emails.wire-transfer_decline', ['user' => $user, 'withdrawal' => $withdrawal], function ($message) use ($user) {
                    $message->to($user->email)->subject('transfer Declined');
                });

                return redirect()->back()->withErrors(['message' => 'Withdrawal Declined.']);
                break;

            default:
                return redirect()->back()->withErrors(['message' => 'Invalid action.']);
                break;
        }
    }

    public function crypto_admin_action(Request $request, $id){
        $action = $request->query('action');
        $crypto_trf = CryptoWithdrawal::findOrFail($id);
        $withdrawal_amount = $crypto_trf->amount;
        $useremail = $crypto_trf->users_email;
        $user = User::where('email', $useremail)->first();
       

        switch ($action) {
            case 'confirm':
                $user->accbalance -= $withdrawal_amount;
                $crypto_trf->status = 'success';
                $crypto_trf->save();
                $user->save();



                //Send Mail
                Mail::send('emails.crypto-withdrawal_confirmed', ['user' => $user, 'transactionData' => $crypto_trf ], function ($message) use ($user) {
                    $message->to($user->email)->subject('Crypto Transfer Approved');
                });
            return redirect()->back()->with('success', 'withdrawal approved');

                break;
            case 'decline':
                $crypto_trf->status = 'declined';
                $crypto_trf->save();
                //Send Mail
                Mail::send('emails.crypto-withdrawal_declined', ['user' => $user, 'transactionData' => $crypto_trf ], function ($message) use ($user) {
                    $message->to($user->email)->subject('Crypto Transfer Declined');
                });
                return redirect()->back()->withErrors(['message' => 'withdrawal declined']);
            
            default:
                # code...
                break;
        }
    }






    public function end_investment($id)
    {
        $investment = investmentplan::findOrFail($id);
        $investment->status = 'ended';
        $investment->save();
        $invested_amount = $investment->amount;
        $invested_profit = $investment->profit;
        $total = $invested_amount + $invested_profit;

        $user = User::where('email', $investment->email)->first();
        $user_profit = $user->profit;
        $new_profit = $total + $user_profit;
        $user->profit = $new_profit; // Update user's profit
        $user->save();

        return redirect()->back()->with('success', 'Investment plan has been successfully ended.');
    }





    public function kyc_action(Request $request, $id)
    {
        $action = $request->query('action');
        $kyc_find = kyc_verification::findOrFail($id); // Fetch the user based on the provided ID
        $useremail = $kyc_find->email;
        $user = User::where('email', $useremail)->first();


        switch ($action) {
            case 'confirm':
                $kyc_find->status = 'confirmed';
                $kyc_find->save();
                $user->kyc_verify = 'true';
                $user->save();



                //send Mail
                return redirect()->back()->with('success', 'KYC confirmed.');
                break;
               
            case 'decline':
                $kyc_find->delete(); // Delete the record from the database
                return redirect()->back()->withErrors(['message' => 'KYC declined and record deleted..']);
                break;

            default:
                # code...
                break;
        }
    }



    public function update_withdrawal_options(Request $request, $id)
    {
        $validatedData = $request->validate([
            'withdrawal_fee_option' => 'sometimes|required',
            'withdrawal_fee' => 'sometimes|required|numeric',
            'fee_name' => 'sometimes|required|string',
        ]);
        $withdrawal = Userwithdraw::findOrFail($id);

        $withdrawal->wfee = $request->input('withdrawal_fee_option');
        $withdrawal->fee = $request->input('withdrawal_fee');
        $withdrawal->fee_name = $request->input('fee_name');
        $withdrawal->save();
        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }


    public function delete_deposit($id)
    {
        try {
            $deposit = Userdeposit::findOrFail($id); // Find the deposit by ID
            $deposit->delete(); // Delete the deposit

            return redirect()->back()->with('success', 'Deposit deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Failed to delete deposit.']);
        }
    }

    public function verify_users_action(Request $request, $id)
    {
        $action = $request->query('action');
        $verify_user = User::findOrFail($id); // Fetch the user record based on the provided ID


        switch ($action) {
            case 'confirm':
                $verify_user->user_verify = 'true';
                $verify_user->save();



                //send Mail
                return redirect()->back()->with('success', 'Account Verified.');
                break;
                break;
            case 'decline':
                $verify_user->delete(); // Delete the record from the database
                return redirect()->back()->withErrors(['message' => 'Account deleted..']);
                break;

            default:
                # code...
                break;
        }
    }

    public function fund_account_store(Request $request){

        $validatedData = $request->validate([
            'account_number' => 'required|numeric',
            'account_type' => 'required|string',
            'amount' => 'required|numeric',
            'transaction_type' => 'required|string',
            'transaction_method' => 'required|string',
            'date' => 'required|date',
        ]);

        $accountType = $validatedData['account_type'];
        


        switch ($accountType) {
            case 'checking':
                $user = User::where('account_number_checking', $validatedData['account_number'])->first();
                $transactionId = Str::uuid()->toString();
                 // Create a new transaction record
                Transactions::create([
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'account' => $validatedData['account_type'],
                    'amount' => $validatedData['amount'],
                    'transaction_type' => $validatedData['transaction_type'],
                    'transaction_name' => $validatedData['transaction_method'],
                    'status' => 'Approved',
                    'transaction_id' => $transactionId, // Include transaction ID
                    'wallet_address' => 'N/A',
                    'dateadd' => $validatedData['date'], // Include transfer date
                ]);
                return redirect()->back()->with('success', 'Transaction Created');
            case 'savings':
                $user = User::where('account_number_savings', $validatedData['account_number'])->first();
                $transactionId = Str::uuid()->toString();
                 // Create a new transaction record
                Transactions::create([
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'account' => $validatedData['account_type'],
                    'amount' => $validatedData['amount'],
                    'transaction_type' => $validatedData['transaction_type'],
                    'transaction_name' => $validatedData['transaction_method'],
                    'status' => 'Approved',
                    'transaction_id' => $transactionId, // Include transaction ID
                    'wallet_address' => 'N/A',
                    'dateadd' => $validatedData['date'], // Include transfer date
                ]);
                return redirect()->back()->with('success', 'Transaction Created');

            
            default:
                # code...
                break;
        }


    }
}
