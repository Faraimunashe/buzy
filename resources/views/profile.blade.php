<x-app-layout>
    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if (is_null($account))
                    <img src="{{asset('images/user.jpg')}}" alt="Profile" class="rounded-circle">
                @else
                    <img src="{{asset('images/profiles')}}/{{$account->image}}" alt="Profile" class="rounded-circle">
                @endif

                <h2>{{Auth::user()->name}}</h2>
                <h3>{{ Auth::user()->roles->first()->display_name }}</h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Username</div>
                                <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                            </div>
                            @if (!is_null($account))
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{$account->phone}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{$account->address}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </section>
</x-app-layout>
