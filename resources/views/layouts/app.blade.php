<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css" crossorigin="anonymous">
    <script src="/vendor/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <link href="/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/admin/general.css">

    
    <title>Propiedades-Backend</title>
  </head>

<body>
    <div id="app">

        <div class="row">
            <div class="col-2">
                @include('layouts.nav')
            </div>
            <div class="col-10">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
    <!-- endmain -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="/vendor/popper.min.js" crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery.easing.compatibility.js" crossorigin="anonymous"></script>
</body>

</html>