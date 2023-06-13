<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Money;
use App\Models\Profit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfitController extends Controller
{
    public function index()
    {
        return view('user.profit');
    }

    public function one($id)
    {
        $profit = Profit::find($id);

        return view('user.one-profit', [
            'profit' => $profit
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'date' => ['required', 'date'],
            'sales_revenue' => ['required', 'numeric'],
            'purchases' => ['required', 'numeric'],
            'other_direct_costs' => ['required', 'numeric'],
            'salaries_and_wages' => ['required', 'numeric'],
            'rent' => ['required', 'numeric'],
            'liabilities' => ['required', 'numeric'],
            'capital_expenses' => ['required', 'numeric'],
            'loan_payment' => ['required', 'numeric'],
            'taxes' => ['required', 'numeric'],
            'insuarance_expenses' => ['required', 'numeric'],
            'advertising_expenses' => ['required', 'numeric'],
            'other_expenses' => ['required', 'numeric'],
        ]);

        try{
            $profit = new Profit();
            $profit->user_id = Auth::id();
            $profit->date = $request->date;
            $profit->sales_revenue = $request->sales_revenue;
            $profit->purchases = $request->purchases;
            $profit->other_direct_costs = $request->other_direct_costs;
            $profit->salaries_and_wages = $request->salaries_and_wages;
            $profit->rent = $request->rent;
            $profit->liabilities = $request->liabilities;
            $profit->capital_expenses = $request->capital_expenses;
            $profit->loan_payment = $request->loan_payment;
            $profit->taxes = $request->taxes;
            $profit->insuarance_expenses = $request->insuarance_expenses;
            $profit->advertising_expenses = $request->advertising_expenses;
            $profit->other_expenses = $request->other_expenses;
            $profit->save();

            $money = new Money();
            $money->user_id = Auth::id();
            $money->from_id = $profit->id;
            $money->from = "profits";
            $money->save();

            return redirect()->back()->with('success', 'successfully added profit/loss data');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
