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
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card bg-secondary">
                        <div class="">
                            <span class="badge bg-primary">{{$objective->deadline}}</span>
                            <button class="btn btn-danger btn-sm m-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#deleteModal{{$objective->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button class="btn btn-dark btn-sm m-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#commentModal{{$objective->id}}">
                                <i class="bi bi-chat"></i>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <p class="pt-3 text-3xl text-white">{{$objective->objective}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
