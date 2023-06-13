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
        <div class="">
            @foreach ($topics as $topic)
                <div class="d-grid gap-2 mt-3 row">
                    <a href="{{route('user-view-businesseducation', $topic->id)}}" class="btn btn-outline-primary btn-lg btn-block">{{$topic->topic}}</a>
                    <span class="badge bg-danger col-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#deleteModal{{$topic->id}}">
                        <i class="bi bi-trash"></i>
                    </span>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
