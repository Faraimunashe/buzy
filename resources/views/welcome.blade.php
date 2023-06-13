<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business Companion</title>
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
                <div class="d-grid gap-2 mt-3">
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-lg btn-block">Business Activity Login</a>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{route('partner')}}" class="btn btn-outline-primary btn-lg btn-block">Apply to register as partner</a>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-lg btn-block">Login As Adminstrator</a>
                </div>
            </div>
          </div>
        </div>
    </section>

</body>
</html>
