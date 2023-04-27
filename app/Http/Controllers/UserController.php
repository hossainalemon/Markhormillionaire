<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Handle user sign up request
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function showSignUpForm()
    {
    return view('signup');
    }
    public function showSigninForm()
    {
    return view('signin');
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
        return view('signup')->withErrors($validator);
        }
        $referralCode = $this->generateReferralCode();
        $user = new User([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'status' => 'active',
        ]);

        $user->save();

    return redirect('/dashboard');
    }
    private function generateReferralCode()
{
    $referralCode = Str::random(6); // Generate a random 6 character string as referral code
    while (User::where('referral_code', $referralCode)->exists()) {
        $referralCode = Str::random(6);
    }
    return $referralCode;
}

    /**
     * Handle user sign in request
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
                return view('signup')->withErrors($validator);
    }

    $credentials = $request->only(['email', 'password']);

    if (!Auth::attempt($credentials)) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('AuthToken')->accessToken;

    return redirect()->route('dashboard')->with(['token' => $token]);
}

public function register($referralCode)
{
    $referrer = User::where('referral_code', $referralCode)->first();
    if (!$referrer) {
        abort(404);
    }

    // Pass the referral code to the view
    return view('signup', ['referral_code' => $referralCode]);
}

}
