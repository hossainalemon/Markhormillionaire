<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;

class DepositController extends Controller
{
    public function index(User $user)
    {
        $deposits = Deposit::where('user_id', $user->id)->get();
        $totalDeposits = Deposit::where('user_id', $user->id)->sum('amount');
        return view('dashboard', compact('user', 'deposits', 'totalDeposits'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'transaction_number' => 'required|unique:deposits',
        ]);

        $deposit = new Deposit;
        $deposit->user_id = auth()->id();
        $deposit->amount = $request->amount;
        $deposit->payment_method = $request->payment_method;
        $deposit->transaction_number = $request->transaction_number;
        $deposit->save();

        return redirect()->route('dashboard')->with('success', 'Deposit created successfully.');
    }

    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('dashboard', compact('deposit'));
    }

    public function edit($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('dashboard', compact('deposit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:bank,mobile_bank',
            'transaction_number' => 'required|unique:deposits',
        ]);

        $deposit = Deposit::findOrFail($id);
        $deposit->amount = $request->amount;
        $deposit->payment_method = $request->payment_method;
        $deposit->transaction_number = $validatedData['transaction_number'];
        $deposit->save();

        return redirect()->route('dashboard', $deposit->id)->with('success', 'Deposit updated successfully.');
    }

    public function destroy($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return redirect()->route('dashboard')->with('success', 'Deposit deleted successfully.');
    }
}
