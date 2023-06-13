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
                    <a href="#" class="btn btn-outline-primary btn-lg btn-block">{{$topic->topic}}</a>
                    <span class="badge bg-danger col-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#deleteModal{{$topic->id}}">
                        <i class="bi bi-trash"></i>
                    </span>
                </div>
                <div class="modal fade" id="deleteModal{{$topic->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('admin-delete-topic')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Topic</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="topic_id" value="{{$topic->id}}" required>
                                Are you sure you want to delete this topic?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes delete</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            @endforeach
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add
                </button>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{route('admin-add-topic')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Topic</label>
                        <div class="col-sm-10">
                            <input type="text" name="topic" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Information</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="information" id="floatingTextarea" style="height: 100px;" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add topic</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
