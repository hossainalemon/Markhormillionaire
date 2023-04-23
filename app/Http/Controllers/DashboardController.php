<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function signout()
{
    Auth::logout();

    return redirect()->route('signin');
}
}
