<x-app-layout>
    <section class="section">
        <div class="row">
            <a href="{{route('admin-topics')}}" class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/education.jpeg')}}" height="200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="card-footer">
                        Add Business Education
                    </div>
                </div>
            </a>
            <a href="{{route('admin-consultants')}}" class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/consultants.jpeg')}}" height="200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="card-footer">
                        Add Business Consultants
                    </div>
                </div>
            </a>
            <a href="{{route('admin-investors')}}" class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/investors.jpeg')}}" height="200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="card-footer">
                        Add Available Investors
                    </div>
                </div>
            </a>
            <a href="{{route('admin-requests')}}" class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/partners.jpeg')}}" height="200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="card-footer">
                        Partner Join Request
                    </div>
                </div>
            </a>
            <a href="{{route('admin-admins')}}" class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/admin.jpeg')}}" height="200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="card-footer">
                        Add Administrator
                    </div>
                </div>
            </a>
        </div>
    </section>
</x-app-layout>
