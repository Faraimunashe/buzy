<x-app-layout>
    <section class="section">
        <div class="row">
            <a href="{{route('user-business-education')}}" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/education.jpeg')}}" height="130" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">Business Education</h3>
                        <p class="text-dark">
                            Learn the essential skill, knowledge and experience needed to start and run a successful business
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{route('user-objectives')}}" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/objectives.jpeg')}}" height="130" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">Business Objective</h3>
                        <p class="text-dark">
                            Make business timelines and measure performance.
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{route('user-measures')}}" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/measures.jpeg')}}" height="130" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">Key Performance Measures</h3>
                        <p class="text-dark">
                            Measure financial performance of your business and determine business health.
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{route('user-consultants')}}" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/consultants.jpeg')}}" height="130" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">Business Consultance</h3>
                        <p class="text-dark">
                            Interconnect with business consultants for expert business guidance.
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{route('user-investors')}}" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/investors.jpeg')}}" height="130" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">Available Investors</h3>
                        <p class="text-dark">
                            Investors find projects worthy investing in Zimbabwe. You may find business ideas you may like.
                        </p>
                    </div>
                </div>
            </a>
            <a href="#" class="col-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="carousel slide">
                            <img src="{{asset('images/about.jpeg')}}" class="d-block w-100" alt="...">
                        </div>
                        <h3 class="card-title text-primary">About</h3>
                        <p class="text-dark">
                            Learn more about business companion mobile, explore and send your comments.
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </section>
</x-app-layout>
