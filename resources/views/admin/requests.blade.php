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
            @foreach ($requests as $request)
                <div class="list-group-item d-flex justify-content-between align-items-start">
                    <img src="{{asset('images/known_faces/')}}/{{$request->image}}" height="30" alt="request Image" class="rounded m-1">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{$request->fullname}}</div>
                        <div style="font-size: 11px">
                            {{$request->speciality}}
                        </div>
                    </div>
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-dash-square"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Options</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#approveModal{{$request->id}}">
                                    <i class="bi bi-check-square"></i>Approve
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#declineModal{{$request->id}}">
                                    <i class="bi bi-x-square"></i>Decline
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{$request->id}}">
                                    <i class="bi bi-trash"></i>Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal{{$request->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('admin-delete-request')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="request_id" value="{{$request->id}}" required>
                                Are you sure you want to delete this request?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes delete</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="approveModal{{$request->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('admin-approve-request')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Approve Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="request_id" value="{{$request->id}}" required>
                                Are you sure you want to approve this request?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Yes approve</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="declineModal{{$request->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="{{route('admin-decline-request')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Approve Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="request_id" value="{{$request->id}}" required>
                                Are you sure you want to decline this request?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Yes decline</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
