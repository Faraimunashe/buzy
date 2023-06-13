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
                        <div class="card-title">Gross profit and net profit</div>
                        <form class="row g-3" action="{{route('user-add-profit')}}" method="POST">
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
                                <label for="purchases" class="form-label">Purchases</label>
                                <input type="text" name="purchases" class="form-control" id="purchases" required>
                            </div>
                            <div class="col-12">
                                <label for="other_direct_costs" class="form-label">Other Direct Costs</label>
                                <input type="text" name="other_direct_costs" class="form-control" id="other_direct_costs" required>
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
                                <label for="liabilities" class="form-label">Liabilities</label>
                                <input type="text" name="liabilities" class="form-control" id="liabilities" required>
                            </div>
                            <div class="col-12">
                                <label for="capital_expenses" class="form-label">Capital Expenses</label>
                                <input type="text" name="capital_expenses" class="form-control" id="capital_expenses" required>
                            </div>
                            <div class="col-12">
                                <label for="loan_payment" class="form-label">Loan Payment</label>
                                <input type="text" name="loan_payment" class="form-control" id="loan_payment" required>
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
                                <label for="advertising_expenses" class="form-label">Advertising Expenses</label>
                                <input type="text" name="advertising_expenses" class="form-control" id="advertising_expenses" required>
                            </div>
                            <div class="col-12">
                                <label for="other_expenses" class="form-label">Other Expenses</label>
                                <input type="text" name="other_expenses" class="form-control" id="other_expenses" required>
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
