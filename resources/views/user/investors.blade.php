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
        <div class="col-12 list-group list-group-light">
            @foreach ($investors as $investor)
                <div class="list-group-item d-flex justify-content-between align-items-start">
                    <img src="{{asset('images/known_faces/')}}/{{$investor->image}}" height="30" alt="investor Image" class="rounded m-1">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{$investor->fullname}}</div>
                        <div style="font-size: 11px">
                            {{$investor->interest}}
                        </div>
                    </div>
                    {{-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-dash-square"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Options</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{$investor->id}}">
                                    <i class="bi bi-trash"></i>Delete
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
