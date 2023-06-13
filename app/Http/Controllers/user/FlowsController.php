<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CashFlow;
use App\Models\Money;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlowsController extends Controller
{
    public function index()
    {
        return view('user.flows');
    }

    public function one($id)
    {
        $flow = CashFlow::find($id);

        return view('user.one-flow', [
            'flow' => $flow
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'date' => ['required', 'date'],
            'sales_revenue' => ['required', 'numeric'],
            'interest_income' => ['required', 'numeric'],
            'dividend_income' => ['required', 'numeric'],
            'rental_income' => ['required', 'numeric'],
            'capital_contributions' => ['required', 'numeric'],
            'government_grants' => ['required', 'numeric'],
            'proceeds_from_the_sale_of_assets' => ['required', 'numeric'],
            'insuarance_payouts' => ['required', 'numeric'],
            'other_incomes' => ['required', 'numeric'],
            'salaries_and_wages' => ['required', 'numeric'],
            'rent' => ['required', 'numeric'],
            'capital_expenses' => ['required', 'numeric'],
            'utilities' => ['required', 'numeric'],
            'loan_payments' => ['required', 'numeric'],
            'taxes' => ['required', 'numeric'],
            'insuarance_expenses' => ['required', 'numeric'],
            'advertising' => ['required', 'numeric'],
            'mantainance_expenses' => ['required', 'numeric'],
            'other_outflows' => ['required', 'numeric'],
        ]);

        try{
            $flow = new CashFlow();
            $flow->user_id = Auth::id();
            $flow->date = $request->date;
            $flow->sales_revenue = $request->sales_revenue;
            $flow->interest_income = $request->interest_income;
            $flow->dividend_income = $request->dividend_income;
            $flow->rental_income = $request->rental_income;
            $flow->capital_contributions = $request->capital_contributions;
            $flow->government_grants = $request->government_grants;
            $flow->proceeds_from_the_sale_of_assets = $request->proceeds_from_the_sale_of_assets;
            $flow->insuarance_payouts = $request->insuarance_payouts;
            $flow->other_incomes = $request->other_incomes;
            $flow->salaries_and_wages = $request->salaries_and_wages;
            $flow->rent = $request->rent;
            $flow->capital_expenses = $request->capital_expenses;
            $flow->utilities = $request->utilities;
            $flow->loan_payments = $request->loan_payments;
            $flow->taxes = $request->taxes;
            $flow->insuarance_expenses = $request->insuarance_expenses;
            $flow->advertising = $request->advertising;
            $flow->mantainance_expenses = $request->mantainance_expenses;
            $flow->other_outflows = $request->other_outflows;
            $flow->save();

            $money = new Money();
            $money->user_id = Auth::id();
            $money->from_id = $flow->id;
            $money->from = "flows";
            $money->save();

            return redirect()->back()->with('success', 'successfully added in flows data');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
