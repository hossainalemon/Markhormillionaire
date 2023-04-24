<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Withdrawal;

class DashboardController extends Controller
{
    public function index()
    {
       $user = Auth::user();
        $deposits = Deposit::where('user_id', $user->id)->get();
        $totalDeposits = Deposit::where('user_id', $user->id)->sum('amount');
        $totalWithdraw = Withdrawal::where('user_id', $user->id)->sum('amount');

        return view('dashboard', ['user' => $user, "totalDeposits" => $totalDeposits, "totalWithdraw" => $totalWithdraw]);
    }

    public function signout()
{
    Auth::logout();

    return redirect()->route('signin');
}
}
