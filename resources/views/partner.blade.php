<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply - Partnership</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            Apply Partnership
                        </h3>
                        <form method="POST" action="{{route('apply')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Apply As</label>
                                    <div class="col-sm-10">
                                        <select name="apply_as" class="form-control" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="1">Consultant</option>
                                            <option value="2">Investor</option>
                                        </select>
                                    </div>
                                </div>
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
                                    <label for="inputText" class="col-sm-2 col-form-label">Birthdate <code>(optional)</code></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="dob" class="form-control">
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
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>
