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

    $referral_code = Str::random(6);
    $referrer_id = null;

    // check if a referrer ID was provided
    if ($request->has('referral_code')) {
        $referrer = User::where('referral_code', $request->referral_code)->first();
        if ($referrer) {
            $referrer_id = $referrer->id;
        }
    }

    $user = new User([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'customer',
        'status' => 'active',
        'referral_code' => $referral_code,
        'referrer_id' => $referrer_id,
    ]);

    $user->save();

    return redirect('/dashboard');
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



}
