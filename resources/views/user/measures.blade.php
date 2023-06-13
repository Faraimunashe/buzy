<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/measures.jpeg')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Net Profit</h4>
                            <p>
                            Net profit = Total revenue - Total expenses
                            Net profit is an important metric for investors and
                            stakeholders because it indicates the financial health of a
                            company and its ability to generate profits. The resulting figure
                            represents the amount of money that the company has earned after
                            deducting all its expenses. A positive net profit indicates that the company
                            is profitable, while a negative net profit indicates that it is operating at a loss.
                            </p>
                            <hr>
                            <div class="d-grid gap-2 mt-3">
                                <a href="{{route('user-profits')}}" class="btn btn-primary btn-lg btn-block">
                                    Calculate profit margin
                                </a>
                            </div>
                        </div>
                        <div class="alert alert-primary mt-3" role="alert">
                            <h4 class="alert-heading">Cash Flow</h4>
                            <p>
                                Cash flow = Cash inflows - Cash outflows
                                The resulting figure can be positive or negative,
                                indicating whether the company has generated more
                                or less cash than it has spent during the period.
                                A positive cash flow is generally seen as a good sign for a
                                company's financial health.
                            </p>
                            <hr>
                            <div class="d-grid gap-2 mt-3">
                                <a href="{{route('user-flows')}}" class="btn btn-primary btn-lg btn-block">
                                    Calculate cash flow
                                </a>
                            </div>
                        </div>

                        @foreach ($monies as $item)
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card bg-secondary">
                                        <div class="">
                                            <span class="badge bg-primary">{{$item->from}}</span>
                                            @if ($item->from == "profits")
                                                <a href="{{route('user-profit', $item->from_id)}}" class="btn btn-dark btn-sm m-1" style="float: right;">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            @else
                                                <a href="{{route('user-flow', $item->from_id)}}" class="btn btn-dark btn-sm m-1" style="float: right;">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="card-body text-center">
                                            <p class="pt-3 text-3xl text-white">{{$item->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
