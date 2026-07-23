<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Dotenv\Exception\ValidationException;

class AuthController extends Controller
{
    //
    public function registerPage()
    {
        return view('unauth.register');
    }


    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'fullname' => 'required',
                'email' => 'required|email|unique:users',
                'address' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'country' => 'required',
                'date_of_birth' => 'required',
                'pin' => 'required',
                'password' => 'required|min:6',
            ]);

            // Generate unique 10-digit account number
            do {
                $accountNumberChecking = (string) random_int(1000000000, 9999999999);
                $accountNumberSavings = (string) random_int(1000000000, 9999999999);
            } while (
                User::where('account_number_checking', $accountNumberChecking)->exists() ||
                User::where('account_number_savings', $accountNumberSavings)->exists()
            );

            $validated['account_number_checking'] = $accountNumberChecking;
            $validated['account_number_savings'] = $accountNumberSavings;

            $user = User::create($validated);

            //Send Mail


            $token = Str::random(60); // You can adjust the length as needed
            DB::table('email_verification')->updateOrInsert(
                ['email' => $user->email],
                ['email' => $user->email, 'token' => $token, 'created_at' => now()]
            );

            // Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            //     $message->to($user->email)->subject('Account Created');
            // });



            return redirect()->route('login')->with('success', 'User registered successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            // Handle database errors
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while registering the user.']);
        }
    }

    public function loginPage()
    {
        return view('unauth.login');
    }


    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);



            // // First, check if the user exists and is verified

            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'Invalid login credentials'])->withInput();
            }

            $Usercheck = $user->user_verify;



            // $Verify_check = DB::table('users')->where('email', $credentials['email'])->first();




            // If the user is not verified, return an error
            // if ($Usercheck !== 'true') {
            //     return redirect()->back()->withErrors(['error' => 'Your account is not verified.'])->withInput();
            // }












            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Check if the authenticated user is an admin
                if (Auth::user()->role === 'admin') {
                    // Redirect admin to the admin dashboard
                    return redirect()->intended('admindashboard')->with('success', 'Login successful! Welcome to your dashboard.');
                }

                // Redirect other authenticated users to the intended URL or a default dashboard route
                return redirect()->intended('dashboard')->with('success', 'Login successful! Welcome to your dashboard.');
            }

            // If authentication fails, add a custom error message
            return redirect()->back()->withErrors(['error' => 'Account cannot be found'])->withInput();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions, including QueryException
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred. Please try again later.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('update_password')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('update_password')->withErrors(['message' => 'Invalid password credentials.']);
        }

        return redirect()->route('update_password')->withErrors(['message' => 'Password Change Error.']);
    }


    public function forgot_password()
    {
        return view('unauth.forgot_password');
    }



    public function forgot_password_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('forgot_password')->withErrors(['message' => 'Email not found in our records']);
        }

        $token = Str::random(60); // You can adjust the length as needed
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['email' => $user->email, 'token' => $token, 'created_at' => now()]
        );

        //Send Mail
        Mail::send('emails.reset_password', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email)->subject('Reset Password');
        });


        return redirect()->back()->with('success', 'Reset Email sent successfully.');
    }





    public function confirm_password_token($token)
    {
        $tokenRecord = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$tokenRecord) {
            return redirect()->route('forgot_password')->withErrors(['message' => 'Invalid token']);
        }

        // Pass the token to the password reset form
        // return redirect()->route('reset_password_form', ['token' => $token]);
        return view('unauth.reset_password_form',  ['token' => $token]);
    }

    public function reset_password_user(Request $request)
    {


        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $token = $request->input('token');
        $tokenRecord = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$tokenRecord) {
            return redirect()->route('forgot_password')->withErrors(['message' => 'Invalid token']);
        }

        // Update the user's password
        $user = User::where('email', $tokenRecord->email)->first();

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // Remove the used token
        DB::table('password_reset_tokens')->where('token', $token)->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully. Please log in.');
    }


    public function verify_email($token)
    {

        $tokenRecord = DB::table('email_verification')->where('token', $token)->first();

        if (!$tokenRecord) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid token']);
        }



        // Update the user's password
        $user = User::where('email', $tokenRecord->email)->first();

        if ($user->email_verify == "yes") {
            return redirect()->route('login')->withErrors(['message' => 'Email Already Verified']);
        }

        $user->email_verify = 'yes';
        $user->save();

        return redirect()->route('login')->with('success', 'Email Succesfully Verified.');
    }
}
