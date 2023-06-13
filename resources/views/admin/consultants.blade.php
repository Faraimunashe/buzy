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
            @foreach ($consultants as $consultant)
                <div class="list-group-item d-flex justify-content-between align-items-start">
                    <img src="{{asset('images/known_faces/')}}/{{$consultant->image}}" height="30" alt="Consultant Image" class="rounded m-1">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{$consultant->fullname}}</div>
                        <div style="font-size: 11px">
                            {{$consultant->speciality}}
                        </div>
                    </div>
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-dash-square"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Options</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{$consultant->id}}">
                                    <i class="bi bi-trash"></i>Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal{{$consultant->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('admin-delete-consultant')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Consultant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="consultant_id" value="{{$consultant->id}}" required>
                                Are you sure you want to delete this consultant?
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
            <form method="POST" action="{{route('admin-add-consultant')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Consultant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Speciality</label>
                        <div class="col-sm-10">
                            <input type="text" name="speciality" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" name="location" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Birthdate</label>
                        <div class="col-sm-10">
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Individual/Company</label>
                        <div class="col-sm-10">
                            <select name="company" class="form-control" required>
                                <option selected disabled>Select Option</option>
                                <option value="Individual">Individual</option>
                                <option value="Company">Company</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Consultant</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
