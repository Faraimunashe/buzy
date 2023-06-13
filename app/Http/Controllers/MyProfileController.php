<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $account = Account::where('user_id', Auth::id())->first();
        return view('profile', [
            'user' => $user,
            'account' => $account
        ]);
    }
}
