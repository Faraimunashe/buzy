<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Calculate cash flows</div>
                        <form class="row g-3" action="{{route('user-add-flow')}}" method="POST">
                            @csrf
                            <div class="col-12">
                              <label for="date" class="form-label">Date</label>
                              <input type="date" name="date" class="form-control" id="date" required>
                            </div>
                            <div class="alert alert-primary mt-3" role="alert">
                                <p>
                                    Enter the total amounts in each digit entry. Input a zero if there is none.
                                    NB : Below the entry boxes is a guide of data input.
                                    All the entries are for a specific period for example
                                    from start of the month to end and will not include closing balance
                                    from previous period. This is just to measure profit generated for
                                    the specified period.
                                </p>
                            </div>
                            <div class="alert alert-primary mt-3" role="alert">
                                <b>
                                    Net Profit
                                </b>
                            </div>
                            <div class="col-12">
                              <label for="sales_revenue" class="form-label">Sales Revenue</label>
                              <input type="text" name="sales_revenue" class="form-control" id="sales_revenue" required>
                            </div>
                            <div class="col-12">
                                <label for="interest_income" class="form-label">Interest Income</label>
                                <input type="text" name="interest_income" class="form-control" id="interest_income" required>
                            </div>
                            <div class="col-12">
                                <label for="dividend_income" class="form-label">Dividend Income</label>
                                <input type="text" name="dividend_income" class="form-control" id="dividend_income" required>
                            </div>
                            <div class="col-12">
                                <label for="rental_income" class="form-label">Rental Income</label>
                                <input type="text" name="rental_income" class="form-control" id="rental_income" required>
                            </div>
                            <div class="col-12">
                                <label for="rent" class="form-label">Rent</label>
                                <input type="text" name="rent" class="form-control" id="rent" required>
                            </div>
                            <div class="col-12">
                                <label for="capital_contributions" class="form-label">Capital Contributions</label>
                                <input type="text" name="capital_contributions" class="form-control" id="capital_contributions" required>
                            </div>
                            <div class="col-12">
                                <label for="government_grants" class="form-label">Government Grants</label>
                                <input type="text" name="government_grants" class="form-control" id="government_grants" required>
                            </div>
                            <div class="col-12">
                                <label for="proceeds_from_the_sale_of_assets" class="form-label">Proceeds from the sale of assets</label>
                                <input type="text" name="proceeds_from_the_sale_of_assets" class="form-control" id="proceeds_from_the_sale_of_assets" required>
                            </div>
                            <div class="col-12">
                                <label for="insuarance_payouts" class="form-label">Insuarance Payouts</label>
                                <input type="text" name="insuarance_payouts" class="form-control" id="insuarance_payouts" required>
                            </div>
                            <div class="col-12">
                                <label for="other_incomes" class="form-label">Other Incomes</label>
                                <input type="text" name="other_incomes" class="form-control" id="other_incomes" required>
                            </div>
                            <div class="col-12">
                                <label for="salaries_and_wages" class="form-label">Salaries & Wages</label>
                                <input type="text" name="salaries_and_wages" class="form-control" id="salaries_and_wages" required>
                            </div>
                            <div class="col-12">
                                <label for="rent" class="form-label">Rent</label>
                                <input type="text" name="rent" class="form-control" id="rent" required>
                            </div>
                            <div class="col-12">
                                <label for="capital_expenses" class="form-label">Capital Expenses</label>
                                <input type="text" name="capital_expenses" class="form-control" id="capital_expenses" required>
                            </div>

                            <div class="col-12">
                                <label for="utilities" class="form-label">Utilities</label>
                                <input type="text" name="utilities" class="form-control" id="utilities" required>
                            </div>

                            <div class="col-12">
                                <label for="loan_payments" class="form-label">Loan Payments</label>
                                <input type="text" name="loan_payments" class="form-control" id="loan_payments" required>
                            </div>

                            <div class="col-12">
                                <label for="taxes" class="form-label">Taxes</label>
                                <input type="text" name="taxes" class="form-control" id="taxes" required>
                            </div>

                            <div class="col-12">
                                <label for="insuarance_expenses" class="form-label">Insuarance Expenses</label>
                                <input type="text" name="insuarance_expenses" class="form-control" id="insuarance_expenses" required>
                            </div>

                            <div class="col-12">
                                <label for="advertising" class="form-label">Advertising</label>
                                <input type="text" name="advertising" class="form-control" id="advertising" required>
                            </div>

                            <div class="col-12">
                                <label for="mantainance_expenses" class="form-label">Mantainance Expenses</label>
                                <input type="text" name="mantainance_expenses" class="form-control" id="mantainance_expenses" required>
                            </div>

                            <div class="col-12">
                                <label for="other_outflows" class="form-label">Other Outflows</label>
                                <input type="text" name="other_outflows" class="form-control" id="other_outflows" required>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
