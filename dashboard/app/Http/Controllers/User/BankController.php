<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\WireTransfer;
use App\Models\Transactions;
use App\Models\LocalTransfer;
use App\Models\Loan;
use App\Models\Grant;
use App\Models\CardDeposit;
use App\Models\ChequeDeposit;
use App\Models\Userdeposit;
use App\Models\CryptoWithdrawal;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




class BankController extends Controller
{
    //
    public function wire_transfer_add(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'recipient_name' => 'required|string',
            'from_account' => 'required|string',
            'recipient_account_number' => 'required|string', // Updated to string
            'recipient_bank_name' => 'required|string',
            'recipient_routing_number' => 'required|string', // Updated to string
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'description' => 'nullable|string', // Made optional
            'pin' => 'required|string',
        ]);

       $walletBalance;

        if ($request->from_account == "checking") {
           $walletBalance = $user->accbalance_checking;
        }elseif ($request->from_account == "savings") {
            $walletBalance = $user->accbalance_savings;
        }

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();

        $amount_to_withdraw = $request->amount;


        if ($amount_to_withdraw > $walletBalance) {
            # code...
            return redirect()->back()->withErrors(['message' => 'Withdrawal amount exceeds your available balance.']);
        }

        if ($user->account_status === 'RESTRICTED') {
            return redirect()->back()->withErrors([
                'message' => 'Your account is currently under restriction, so this request cannot be completed. Please contact support for help.'
                ]);

        }

        if ($user->pin !== $validatedData['pin']) {
            return redirect()->back()->withErrors([
                'message' => 'Incorrect Transfer PIN'
                ]);
        }

       

        

        // Create a new wire transfer record
        WireTransfer::create([
            'senders_email' => $user->email,
            'senders_name' => $user->fullname,
            'account_sent_from' => $validatedData['from_account'],
            'recipient_name' => $validatedData['recipient_name'],
            'recipient_account_number' => $validatedData['recipient_account_number'],
            'recipient_bank_name' => $validatedData['recipient_bank_name'],
            'recipient_routing_number' => $validatedData['recipient_routing_number'],
            'amount' => $validatedData['amount'],
            'description' => $validatedData['description'],

            'transid' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
         ]);

         // Create a new transaction record
        Transactions::create([
            'fullname' => $user->fullname,
            'email' => $user->email,
            'account' => $validatedData['from_account'],
            'amount' => $validatedData['amount'],
            'transaction_type' => 'debit',
            'transaction_name' => 'wire transfer',
            'status' => 'pending',
            'transaction_id' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
         ]);


         //Send Mail
        Mail::send('emails.wire-transfer_pending', ['user' => $user, 'transid' => $transactionId, 'withdrawal_amount' => $validatedData['amount'], 'recipient_name' => $validatedData['recipient_name'],'recipient_account_number' => $validatedData['recipient_account_number'], 'recipient_bank_name' => $validatedData['recipient_bank_name']], function ($message) use ($user) {
            $message->to($user->email)->subject('Wire transfer Pending');
        });


        // Redirect or respond with success
        return redirect()->back()->with('success', 'Your wire transfer is being reviewed.');
    }


    public function local_transfer_add(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'from_account' => 'required|string',
            'account' => 'required|string', // Updated to string
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'description' => 'nullable|string', // Made optional
            'pin' => 'required|string',
        ]);

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();

        $walletBalance;

        if ($request->from_account == "checking") {
            $walletBalance = $user->accbalance_checking;
        }elseif ($request->from_account == "savings") {
            $walletBalance = $user->accbalance_savings;
        }


        $amount_to_withdraw = $request->amount;


        if ($amount_to_withdraw > $walletBalance) {
            # code...
            return redirect()->back()->withErrors(['message' => 'Withdrawal amount exceeds your available balance.']);
        }

        if ($user->account_status === 'RESTRICTED') {
            return redirect()->back()->withErrors([
                'message' => 'Your account is currently under restriction, so this request cannot be completed. Please contact support for help.'
                ]);

        }

        if ($user->pin !== $validatedData['pin']) {
            return redirect()->back()->withErrors([
                'message' => 'Incorrect Transfer PIN'
                ]);
        }

        // Create a new wire transfer record
        LocalTransfer::create([
            'senders_name' => $user->fullname, // From Auth user
            'senders_email' => $user->email, // From Auth user
            'recipient_account_number' => $validatedData['account'],
            'amount' => $validatedData['amount'],
            'transfer_note' => $validatedData['description'],
            'transid' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);

        // Create a new transaction record
        Transactions::create([
            'fullname' => $user->fullname,
            'email' => $user->email,
            'account' => $validatedData['from_account'],
            'amount' => $validatedData['amount'],
            'transaction_type' => 'debit',
            'transaction_name' => 'internal transfer',
            'status' => 'pending',
            'transaction_id' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);


        // Redirect or respond with success
        return redirect()->back()->with('success', 'Your Local transfer is being reviewed.');
    }



    public function crypto_withdrawal_add(Request $request){
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'from_account' => 'required|string',
            'crypto_type' => 'required|string',
            'wallet_address' => 'required|string', // Updated to string
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'pin' => 'required|string',
        ]);

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();

        $walletBalance;

        if ($request->from_account == "checking") {
            $walletBalance = $user->accbalance_checking;
        }elseif ($request->from_account == "savings") {
            $walletBalance = $user->accbalance_savings;
        }


        $amount_to_withdraw = $request->amount;


        if ($amount_to_withdraw > $walletBalance) {
            # code...
            return redirect()->back()->withErrors(['message' => 'Withdrawal amount exceeds your available balance.']);
        }

        if ($user->account_status === 'RESTRICTED') {
            return redirect()->back()->withErrors([
                'message' => 'Your account is currently under restriction, so this request cannot be completed. Please contact support for help.'
                ]);

        }

        if ($user->pin !== $validatedData['pin']) {
            return redirect()->back()->withErrors([
                'message' => 'Incorrect Transfer PIN'
                ]);
        }

        CryptoWithdrawal::create([
            'users_name' => $user->fullname,
            'users_email' => $user->email,
            'amount' => $validatedData['amount'],
            'coin_type' => $validatedData['crypto_type'],
            'wallet_address' => $validatedData['wallet_address'],
            'transid' => $transactionId,
            'dateadd' => $currentDate,
        ]);

        // Create a new transaction record
        Transactions::create([
            'fullname' => $user->fullname,
            'email' => $user->email,
            'account' => $validatedData['from_account'],
            'amount' => $validatedData['amount'],
            'transaction_type' => 'debit',
            'transaction_name' => 'crypto withdrawal',
            'status' => 'pending',
            'transaction_id' => $transactionId, // Include transaction ID
            'wallet_address' => $validatedData['wallet_address'],
            'dateadd' => $currentDate, // Include transfer date
        ]);






         // Redirect or respond with success
        return redirect()->back()->with('success', 'Your crypto withdrawal is being reviewed.');
    }




    public function grant_add(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'grant_type' => 'required|string',
            'grant_purpose' => 'required|string',

        ]);

       

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();

        Grant::create([

            'fullname' => $user->fullname, // From Auth user
            'email' => $user->email, // From Auth user
            'grant_type' => $validatedData['grant_type'],
            'grant_purpose' => $validatedData['grant_purpose'],
            'amount' => $validatedData['amount'],
            'transid' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);






        return redirect()->back()->with('success', 'Your Grant application is being reviewed.');
    }

    public function card_deposit_store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'card_holder_name' => 'required|string',
            'card_number' => 'required|string',
            'expiration_date' => 'required|string',
            'cvv' => 'required|string',
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'note' => 'required|string',

        ]);

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();

        CardDeposit::create([
            'fullname' => $user->fullname, // From Auth user
            'email' => $user->email, // From Auth user
            'amount' => $validatedData['amount'],
            'card_name' => $validatedData['card_holder_name'],
            'card_number' => $validatedData['card_number'],
            'exp_date' => $validatedData['expiration_date'],
            'cvv' => $validatedData['cvv'],
            'note' => $validatedData['note'],
            'transid' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);

        return redirect()->back()->with('success', 'Your card deposit is being processed.');
    }


    public function cheque_deposit_store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Debugging: Check if the user is properly authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User is not authenticated. Please log in.');
        }

        $validatedData = $request->validate([
            'cheque_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'to_account' => 'required|string',
            'amount' => 'required|numeric|min:0.01', // Allowing decimal values for amounts
            'description' => 'required|string',
        ]);

       

        $transactionId = Str::uuid()->toString();
        $currentDate = Carbon::now();


        $uploadedImage = $request->file('cheque_image');
        // Generate a unique filename for the uploaded image
        $filename = time() . '_' . $uploadedImage->getClientOriginalName();

        // // Store the image in a location within the 'public' disk
        // $imagePath = $uploadedImage->store('proof_images', 'public');
        // Store the image in a location within the 'public' disk with a custom filename
        $imagePath = $uploadedImage->storeAs('cheque_image', $filename, 'public');

        // Update the deposit record and set status to 'unconfirmed'
        // $userDeposit->proof = $filename;
        // $userDeposit->status = 'unconfirmed';
        // $userDeposit->save();

        ChequeDeposit::create([
            'fullname' => $user->fullname, // From Auth user
            'email' => $user->email, // From Auth user
            'amount' => $validatedData['amount'],
            'note' => $validatedData['description'],
            'proof' => $filename,
            'transid' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);

         // Create a new transaction record
        Transactions::create([
            'email' => $user->email,
            'account' => $validatedData['to_account'],
            'amount' => $validatedData['amount'],
            'transaction_type' => 'credit',
            'transaction_name' => 'cheque deposit',
            'status' => 'pending',
            'transaction_id' => $transactionId, // Include transaction ID
            'dateadd' => $currentDate, // Include transfer date
        ]);



        return redirect()->back()->with('success', 'Your cheque deposit is being processed.');
    }
}
