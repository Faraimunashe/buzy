<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasureController extends Controller
{
    public function index()
    {
        $monies = Money::where('user_id', Auth::id())->get();
        return view('user.measures', [
            'monies' => $monies
        ]);
    }
}
