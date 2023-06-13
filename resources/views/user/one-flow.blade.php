<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center text-bold mt-3">
                            <strong>
                                <h4>{{$flow->created_at->format('F d, Y')}}</h4>
                            </strong>
                        </div>
                        @php
                            $inflows = $flow->sale_revenue+$flow->interest_income+$flow->dividend_income+$flow->rental_income+$flow->capital_contributions+$flow->government_grants+$flow->proceeds_from_the_sale_of_assets+$flow->insuarance_payouts+$flow->other_incomes;
                            $outflows = $flow->salaries_and_wages+$flow->rent+$flow->capital_expenses+$flow->utilities+$flow->loan_payments+$flow->taxes+$flow->insuarance_expenses+$flow->advertising+$flow->mantainance_expenses+$flow->other_outflows;
                            $cashflow = $inflows-$outflows;
                        @endphp
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Inflows Total <span style="float: right;">${{$inflows}}</span></li>
                            <li class="list-group-item">Total Outflows <span style="float: right;">${{$outflows}}</span></li>
                            <li class="list-group-item">Cashflow <span style="float: right;">${{$cashflow}}</span></li>

                        </ul>
                        <div class="alert alert-primary mt-4">
                            <strong>Cashflow result</strong>
                        </div>
                        @if ($cashflow < 0)
                            A negative cash flow result shown means that the amount of money going out is greater than the amount of money coming in, and signals that there are problems with how a business is managing its money. In order to address this issue and turn a negative cash flow into a positive one, the first step is to create a budget and track the sources and uses of cash. This way, you can identify any potential issues that might be causing the negative cash flow and take measures to address them. It's important to look for ways to reduce operational costs, such as renegotiating supplier contracts or renegotiating debt payments to reduce interest payments.
                        @elseif ($cashflow > 0)
                            Positive cash flow result shown means that a business has more money coming in than going out. This is a very healthy situation for a business because it allows them to reinvest in the company, pay off debts, and build financial reserves. Here are some comments and recommendations for maintaining positive cash flow:
                            <ol>
                                <li>Limit unnecessary expenses</li>
                                <li>Increase revenue</li>
                                <li>Monitor cash flow regularly</li>
                                <li>Improve collection processes</li>
                                <li>Explore financing options</li>
                            </ol>
                        @elseif ($cashflow == 0)
                            A cashflow that is equal to zero means that the company is not generating any profits or losses. This can be a concerning situation as it indicates that the business is not growing or expanding. To improve this situation, the company needs to focus on increasing its revenue and reducing its expenses. This can be achieved by implementing cost-cutting measures, increasing sales through marketing and advertising, improving customer service, and exploring new business opportunities. Additionally, the company should consider seeking external funding or investment to help boost its cashflow and support growth initiatives. By taking these steps, the company can improve its financial position and ensure long-term success.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
