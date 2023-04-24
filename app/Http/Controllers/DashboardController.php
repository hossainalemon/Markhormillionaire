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
        $totalDeposits = Deposit::where('user_id', $user->id)->where('status', 'active')->sum('amount');
        $totalWithdraw = Withdrawal::where('user_id', $user->id)->sum('amount');
        $deposits = Deposit::where('status', 'pending')->get();
        $withdrawals = Withdrawal::all();
        return view('dashboard', ['user' => $user, "totalDeposits" => $totalDeposits, "totalWithdraw" => $totalWithdraw, "withdrawals"=>$withdrawals, "deposits"=>$deposits]);
    }
   public function dipositupdate(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,active,rejected',
    ]);
    $deposit = Deposit::findOrFail($id);

    $user = Auth::user();
    if ($deposit->user_id != $user->id) {
        return redirect()->route('dashboard')->with('error', 'You are not authorized to perform this action.');
    }

    $deposit->status = $request->status;
    $deposit->save();

    return redirect()->route('dashboard')->with('success', 'Deposit Accept successfully.');
}

 public function dipoststore(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'transaction_number' => 'required|max:255',
        ]);

        $deposit = new Deposit;
        $deposit->user_id = auth()->id();
        $deposit->amount = $request->amount;
        $deposit->payment_method = $request->payment_method;
        $deposit->transaction_number = $request->transaction_number;
        $deposit->save();

        return redirect()->route('dashboard')->with('success', 'Deposit Request Pending.');
    }



    public function signout()
{
    Auth::logout();

    return redirect()->route('signin');
}
}
