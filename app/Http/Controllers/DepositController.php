<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;

class DepositController extends Controller
{

    public function totalDeposits(User $user)
    {
        $deposits = Deposit::where('user_id', $user->id)->get();
        $totalDeposits = Deposit::where('user_id', $user->id)->sum('amount');
        return view('dashboard', compact('user', 'deposits', 'totalDeposits'));
    }
    


    /**
     * Show the form for creating a new deposit.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created deposit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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



    /**
     * Display the specified deposit.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('dashboard', compact('deposit'));
    }

    /**
     * Show the form for editing the specified deposit.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('dashboard', compact('deposit'));
    }

    /**
     * Update the specified deposit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $deposit->transaction_number = $request->transaction_number;
        $deposit->save();

        return redirect()->route('dashboard', $deposit->id)->with('success', 'Deposit updated successfully.');
    }

    /**
     * Remove the specified deposit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return redirect()->route('dashboard')->with('success', 'Deposit deleted successfully.');
    }
}
