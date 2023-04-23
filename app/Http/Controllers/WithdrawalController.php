<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class WithdrawalController extends Controller
{
    public function showWithdrawalForm()
{
    return view('dashboard');
}

public function createWithdrawal(Request $request)
{
    $validatedData = $request->validate([
        'amount' => 'required|numeric',
        'payment_method' => 'required|string',
        'account_number' => 'required|string',
    ]);

    $validatedData['status'] = 'pending';
    $validatedData['user_id'] = Auth::user()->id;

    Withdrawal::create($validatedData);

    return redirect()->route('dashboard')->back()->with('success', 'Your withdrawal request has been submitted successfully.');
}

}
