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
                <a href="{{route('user-investor', $investor->id)}}" class="list-group-item d-flex justify-content-between align-items-start">
                    <img src="{{asset('images/known_faces/')}}/{{$investor->image}}" height="30" alt="investor Image" class="rounded m-1">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{$investor->fullname}}</div>
                        <div style="font-size: 11px">
                            {{$investor->interest}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-app-layout>
