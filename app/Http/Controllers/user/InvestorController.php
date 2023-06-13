<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::all();
        return view('user.investors', [
            'investors' => $investors
        ]);
    }
}
