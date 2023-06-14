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
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add Objective
                </button>
            </div>
            @foreach ($objectives as $objective)
                <a href="{{route('user-objective', $objective->id)}}" class="row mt-3">
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
                </a>
                <div class="modal fade" id="deleteModal{{$objective->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('user-delete-objective')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Objective</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="objective_id" value="{{$objective->id}}" required>
                                Are you sure you want to delete this objective?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes delete</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="commentModal{{$objective->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('user-comment-objective')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Comment Objective</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="objective_id" value="{{$objective->id}}" required>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10">
                                        <textarea name="comment" class="form-control" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save comment</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{route('user-add-objective')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Objective</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Objective</label>
                        <div class="col-sm-10">
                            <input type="text" name="objective" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Check Point</label>
                        <div class="col-sm-10">
                            <input type="date" name="checkpoint" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" name="deadline" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Objective</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
