<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = new User([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'status' => 'active',
        ]);

        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
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
        return response()->json(['error' => $validator->errors()], 400);
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
