<x-app-layout>
    <div class="pagetitle">
        <h1>Admin Users</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Admin Users</li>
          </ol>
        </nav>
    </div>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Admin Users List</h5>
                      <div class="float-right" style="justify-content: right;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                            <i class="bi bi-plus"></i>
                            New Admin
                        </button>
                      </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">
                                        @php
                                            $count++;
                                            echo $count;
                                        @endphp
                                    </th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('admin-delete-admin')}}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Admin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" required>
                                                    <p style="color: red">Are you sure you want to delete {{$user->name}} from users?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- End Basic Modal-->
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{route('admin-add-admin')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save admin</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
