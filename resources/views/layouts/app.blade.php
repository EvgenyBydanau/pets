<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Yourpet.by</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <style>
        body {/*background:  url({{asset('images/dog4.jpg')}}); */background-color: #02a951;}


        #myNavbar ul li:first-child {
            margin-left: 0px;
            margin-right: 80px;
        }

        li:first-child:hover{
            background-color: #222;
        }

        li:hover {
            background-color: green;
        }
        i {
            color: green;
        }
        /* The side navigation menu */
        .sidenav {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0;
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover, .offcanvas a:focus{
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-left .5s;
            padding: 20px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

  </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

       /* Set the width of the side navigation to 250px */
        function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>

</head>
<body>
         <nav class="navbar navbar-inverse navbar-static-top">

                   <div class="container">
                    <div class="navbar-header">
                   <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

              <li>
                  <div id="mySidenav" class="sidenav">
                      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                      <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                      <a href="{{ route('pets.index') }}">PETS</a>
                      <a href="{{ route('pets.create') }}">ADD PET</a>
                      <a href="{{ url('/searchform') }}">Search pets</a>

                  </div>

                  <!-- Use any element to open the sidenav -->
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">
                              <i class="fa fa-bars" aria-hidden="true"></i>
                    </span>
              </li>
             <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
             <li><a href="{{ route('pets.index') }}">PETS</a></li>
             <li><a href="{{ route('pets.create') }}">ADD PET</a></li>
             <li><a href="{{ url('/searchform') }}">Search pets</a></li>
                    <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">MENU
                               <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                               <li><a href="{{ route('pets.index') }}">PETS</a></li>
                               <li><a href="{{ route('pets.create') }}">ADD PET</a></li>
                           </ul>
                     </li>


                    </ul>

                   </div>
                </div>


                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                      <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

               </div>

        </nav>


               @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                   <div class = "container">
                       <div class = "row">
                           <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class = "panel panel-default">
            <div class = "panel-default">
            <form action="searchresult" method="POST" role="search">
             {{ csrf_field() }}
            <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search pets" required="true">
            <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
            </button>
                    </span>
                   </div>
               </form>
                   </div>
                     </div>
                          <div class="panel panel-default" id ="main">
                                      <div class="panel-body">
                                           @yield('content')
                                       </div>
                                  </div>
                           </div>
                       </div>
                   </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
