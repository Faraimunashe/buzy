<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center text-bold mt-3">
                            <strong>
                                <h4>{{$profit->created_at->format('F d, Y')}}</h4>
                            </strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sales Revenue <span style="float: right;">${{$profit->sales_revenue}}</span></li>
                            <li class="list-group-item">Purchases <span style="float: right;">${{$profit->purchases}}</span></li>
                            <li class="list-group-item">Other Direct Costs <span style="float: right;">${{$profit->other_direct_costs}}</span></li>
                            @php
                                $gross_profit = $profit->sales_revenue - ($profit->purchases + $profit->other_direct_costs);
                            @endphp
                            <li class="list-group-item">Gross Profit <span style="float: right;">${{$gross_profit}}</span></li>
                            @php
                                $total_expenses = $profit->salaries_and_wages+$profit->rent+$profit->liabitities+$profit->capital_expenses+$profit->loan_payment+$profit->taxes+$profit->insuarance_expenses+$profit->advertising_expenses+$profit->other_expenses;
                            @endphp
                            <li class="list-group-item">Total Expenses <span style="float: right;">${{$total_expenses}}</span></li>
                            @php
                                $net_profit_or_loss = $gross_profit - $total_expenses;
                            @endphp
                            @if ($net_profit_or_loss <= 0)
                                <li class="list-group-item"><strong class="text-danger">Net Loss <span style="float: right;">${{$net_profit_or_loss}}</span></strong></li>
                            @else
                            <li class="list-group-item"><strong class="text-dark">Net Profit <span style="float: right;">${{$net_profit_or_loss}}</span></strong></li>
                            @endif
                        </ul>
                        <div class="alert alert-primary mt-4">
                            <strong>Net Profit margin is</strong> <br>
                            {{($net_profit_or_loss/$profit->sales_revenue)*100}}%
                        </div>

                        <div class="alert alert-primary mt-4">
                            <strong>Result</strong>
                        </div>

                        @if ($net_profit_or_loss < 0)
                            It's important to identify the underlying causes and
                            address them directly. First, investigate areas where
                            costs can be reduced such as overhead expenses, energy usage,
                            or employee wages. If these are not possible to cut, look
                            for ways to increase revenue. This might involve finding new
                            sources of income, tweaking pricing strategies, or introducing promotional
                            offers or discounts. Additionally, it's helpful to review current
                            processes and eliminate any redundancies. Also review the current
                            market performance and look for opportunities that can help boost sales and revenue.
                        @elseif ($net_profit_or_loss > 0)
                            A positive profit margin is a very strong indicator that your business is healthy and growing. However, watch out for any signs of negative margins and be proactive. Don't forget to explore new strategies, such as optimizing costs, investing in research and development, and expanding into new markets.
                            Some recommendations could include:
                            <ol>
                                <li>Reinvest profits</li>
                                <li>Reward employees</li>
                                <li>Focus on customer satisfaction</li>
                                <li>Explore new markets</li>
                            </ol>
                            Best of luck!👍
                        @elseif ($net_profit_or_loss == 0)
                            The business is not making any profit, but it is also not incurring any losses. This may be due to several reasons such as intense competition, high operating costs, or low demand for the company's products or services.

                            While a profit margin of 0 may not be desirable for a company, it is still better than a negative profit margin, which indicates that the company is incurring losses. Moreover, a profit margin of 0 may still be acceptable in certain circumstances, such as when the company is investing heavily in research and development or expanding its operations.

                            However, a profit margin of 0 may not be sustainable in the long run, as the company needs to generate profits to reinvest in the business, pay dividends to its shareholders, and ensure its financial stability. Therefore, the company needs to identify the root causes of its low profit margin and take appropriate measures to improve it, such as reducing costs, increasing revenue, or improving operational efficiency.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
