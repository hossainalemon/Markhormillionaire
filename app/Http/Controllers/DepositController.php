<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function create()
    {
        return view('deposits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'amount' => 'required|numeric|min:1',
        ]);

        Deposit::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return Redirect::back()->with('success', 'Deposit Request submitted successfully!');
    }

    public function index(User $user)
    {
        $deposits = $user->deposits()->orderByDesc('created_at')->get();

        return view('deposits.index', compact('deposits'));
    }

    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('deposits.show', compact('deposit'));
    }

    public function edit($id)
    {
        $deposit = Deposit::findOrFail($id);

        return view('deposits.edit', compact('deposit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:approved,rejected',
        ]);

        $deposit = Deposit::findOrFail($id);
        $deposit->update(['status' => $request->status]);

        return Redirect::back()->with('success', 'Deposit status updated successfully!');
    }

    public function destroy($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return Redirect::back()->with('success', 'Deposit deleted successfully!');
    }
}

