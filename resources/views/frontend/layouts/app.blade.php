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
    <link rel="stylesheet" href="/css/frontend/general.css">

    
    <title>TuProximaProp</title>
  </head>
  <body>

<!-- main -->



<div class="nav-margin">
            {{-- <div class="container-fluid" id="main-container" style="padding-top:55px !important"> --}}
            @yield('content')
            {{-- </div> --}}
        </div>


<!-- endmain -->


</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="/vendor/popper.min.js" crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery.easing.compatibility.js" crossorigin="anonymous"></script>
  </body>
</html>









      
