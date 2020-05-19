<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SGC</title>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #465065">

        <a class="navbar-brand" href="/">Sistema de Gestion de la calidad</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="#">¿Quiénes somos?</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">SGC</a>
            </li>
            <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="#">Quejas y sugerencias</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Galería</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Circulares</a>
            </li>

            @guest   <!-- el usuario NO esta autenticado? -->
    @section('content2')
        <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
    @stop
  @else
    @section('content2')
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf <!-- Este token se utiliza para verificar que el usuario autenticado es el que realmente realiza las solicitudes a la aplicación.-->
          </form>
        </div>
      </li>

      @if(Auth::user()->rol == 1)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register')}}">Registrar</a>
        </li>
      @endif
    @stop
  @endguest
            @yield('content2')
          </ul>
          
          <button data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #465065; border: 1px solid gray; border-radius: 4px;">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <nav class="navbar navbar-dark" style="background-color: #465065">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="/Planificacion">Planeación</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Rev. Rectoria</a> <!--No me acuerdo que era Rev. xD -->
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Registro de Aspirantes</a> <!--Tampoco me acuerdo bien si era Registro de aspirantes -->
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#">Inscripcion</a>
            </li>

          </ul>
        </nav>
      </div>
    </header>

    <style>
    * {
    box-sizing: border-box;
    }

    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 4rem;
    }
    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
      bottom: 3rem;
      z-index: 10;
    }

    /* Declare heights because of positioning of img element */
    .carousel-item {
      height: 32rem;
    }

    .carousel-item > img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 32rem;
    }

    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    [class*="col-"] {
      float: left;
      padding: 15px;
    }

    @media only screen and (min-width: 1034px) {
      .col-s-1 {width: 8.33%;}
      .col-s-2 {width: 16.66%;}
      .col-s-3 {width: 25%;}
      .col-s-4 {width: 33.33%;}
      .col-s-5 {width: 41.66%;}
      .col-s-6 {width: 50%;}
      .col-s-7 {width: 58.33%;}
      .col-s-8 {width: 66.66%;}
      .col-s-9 {width: 75%;}
      .col-s-10 {width: 83.33%;}
      .col-s-11 {width: 91.66%;}
      .col-s-12 {width: 100%;}

      .col-ss-0 {width: 3.33%;}
      .col-ss-1 {width: 20%;}
      .col-ss-2 {width: 12.88%;}
      .col-ss-3 {width: 11.88%;}
    }

      .col-1 {width: 8.33%;}
      .col-2 {width: 16.66%;}
      .col-3 {width: 25%;}
      .col-4 {width: 33.33%;}
      .col-5 {width: 41.66%;}
      .col-6 {width: 50%;}
      .col-7 {width: 58.33%;}
      .col-8 {width: 66.66%;}
      .col-9 {width: 75%;}
      .col-10 {width: 83.33%;}
      .col-11 {width: 91.66%;}
      .col-12 {width: 100%;}
    
    .contenedor {
        margin: 5px;
        border: 3px solid #ccc;
        text-align: center;
      }

    .btn {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
    }

    .smallbtn{
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 1px 10px;
      font-size: 16px;
      cursor: pointer;
      height: 25px;
    }

    .smlist {
      border-bottom: solid 1px gray;
      height: 30px;
      margin-bottom: 10px;
    }

    .pf {
      white-space: nowrap; 
      width: 65%; 
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .pf:hover {
      overflow: visible;
    }

    /* Darker background on mouse-over */
    .btn:hover {
      background-color: RoyalBlue;
    }

    .btn2 {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 25px 70px;
      margin-top: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .btnminus {
      background-color: red;
      border: none;
      color: white;
      cursor: pointer;
      width: 100%;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      padding-left: 30%;
      padding-right: 30%;
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      text-align: center;
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      min-width: 360px;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      position: relative;
      text-align: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .gallery {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 150px;
    }

    .gallery:hover {
      box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }

    .dropbtn {
          background-color: #A4A4A4;
          color: white;
          padding: 12px 16px;
          font-size: 16px;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          max-width: 250px;
          overflow: hidden;
          text-overflow: ellipsis;
        }

        .dropbtn:hover, .dropbtn:focus {
          background-color: #848484;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          overflow: auto;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}

        .rborder {
          border-right: solid 1px gray;
        }

        .multiselect {
          width: 200px;
        }

        .selectBox {
          position: relative;
        }

        .selectBox select {
          width: 100%;
          font-weight: bold;
        }

        .overSelect {
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          bottom: 0;
        }

        #checkboxes {
          display: none;
          border: 1px #dadada solid;
        }

        #checkboxes label {
          display: block;
        }

        #checkboxes label:hover {
          background-color: #1e90ff;
        }

        .search {
          width: 130px;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          font-size: 16px;
          background-color: white;
          background-image: url('/img/icon_search.png');
          background-position: 10px 10px; 
          background-size: 25px 25px;
          background-repeat: no-repeat;
          padding: 12px 20px 12px 40px;
          transition: width 0.4s ease-in-out;
        }

        .search:focus {
          width: 100%;
        }

    </style>

  </head>

  <body>
    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function showDrop(id) {
        document.getElementById(id).classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    </script>
  </body>
</html>