<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="name" id="form1Example13" class="form-control form-control-lg" required/>
                      <label class="form-label" for="form1Example13">Username</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" required/>
                        <label class="form-label" for="form1Example13">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="tel" name="phone" id="form1Example13" class="form-control form-control-lg" required/>
                        <label class="form-label" for="form1Example13">Phone</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="address" id="form1Example13" class="form-control form-control-lg" required/>
                        <label class="form-label" for="form1Example13">Address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" required/>
                      <label class="form-label" for="form1Example23">Password</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password_confirmation" id="form1Example23" class="form-control form-control-lg" required/>
                        <label class="form-label" for="form1Example23">Password Confirmation</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="file" name="image" id="form1Example13" class="form-control form-control-lg"/>
                        <label class="form-label" for="form1Example13">Profile image</label>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                    </div>
                </form>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-lg btn-block">Login</a>
                </div>
            </div>
          </div>
        </div>
    </section>

</body>
</html>
