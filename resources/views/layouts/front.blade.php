<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- style css -->

    <link href=" {{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet" />
    <link href=" {{asset('frontend/css/custom.css')}}" rel="stylesheet" />
        <!-- font carousel -->

    <link href=" {{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href=" {{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" />
        <!-- font owesome-->
        <link href=" {{asset('frontend/css/fontawesome.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
     <style>
       a{
        text-decoration: none !important;
        color:black ;
       }
     </style>
    




</head>
<body   class="dark-edition">

                <div class="wrapper ">
                @include('layouts.inc.frontnavbar')
                         <div class="content">
                               @yield("content")

                        </div>
                </div>




      
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" ></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
      <script src="{{ asset('frontend/js/custom.js') }}" ></script>
      <script src="http://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="{{ asset('frontend/js/checkout.js') }}" ></script>


     
         @if(session('status'))
        {
          <script>
              swal("Connecté avec succès", "You clicked the button!", "success");
          </script>
          }
         @endif
         

@yield('scripts')
</body>
</html>
