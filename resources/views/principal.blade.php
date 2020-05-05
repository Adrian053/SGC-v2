@extends('layouts.plantilla')

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
<!-- //////////////////////////////////////////////////////////////////////// -->
@section('content')

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Titulo 1</h1>
            <p>Texto 1</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Boton 1</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Titulo 2</h1>
            <p>Texto 2</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Boton 2</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Titulo 3</h1>
            <p>Texto 3</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Boton 3</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
  
  <div class="col-12" style="border-bottom: 1px solid gray">
    <div class="col-s-2"></div>
    <div class="col-s-4">
      <h2 class="featurette-heading">MISIÓN</h2>
      <p ALIGN="justify">Contribuir al desarrollo social, económico, político, científico,
      tecnológico, artístico y cultural de Michoacán, de México y del mundo,
      formando seres humanos íntegros, competentes y con liderazgo que
      generen cambio en su entorno, guiados por los valores éticos de
      nuestra Universidad, mediante programas educativos pertinentes y de
      calidad; realizando investigación vinculada con las necesidades
      sociales, que impulse el avance científico, tecnológico y la creación
      artística; estableciendo actividades que rescaten, conserven,
      acrecienten y divulguen los valores universales, las prácticas
      democráticas y el desarrollo sustentable a través de la difusión y
      extensión universitaria</p>
    </div>

    <div class="col-s-4">
      <img class="featurette-image img-fluid mx-auto imgVision" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="img/MISION.png">
    </div>
  </div>

  <div class="col-12" style="border-bottom: 1px solid gray">
    <div class="col-s-2"></div>
    <div class="col-s-4">
      <img class="featurette-image img-fluid mx-auto imgVision" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="img/VISION.png">
    </div>
    <div class="col-s-4">
      <h2 class="featurette-heading">VISIÓN</h2>
      <p ALIGN="justify">La Universidad Michoacana de San Nicolás de Hidalgo es la Máxima
      Casa de Estudios en el Estado de Michoacán con la oferta educativa de
      mayor cobertura, reconocida por su calidad y pertinencia social, que
      forma seres competentes, cultos, participativos, con vocación
      democrática, honestos y con identidad nicolaita, con capacidades para
      resolver la problemática de su entorno.
      Los programas de investigación y creación artística son reconocidos en
      el ámbito local, el nacional y el internacional por sus aportaciones a las
      diversas áreas del conocimiento y a la solución sustentable de
      problemas sociales, en estrecha vinculación con los programas
      educativos.
      Los programas de vinculación con universidades y centros nacionales e
      internacionales de investigación, permiten un intenso intercambio
      científico, cultural y artístico, así como una gran movilidad de la
      comunidad universitaria. Las actividades de extensión proporcionan
      asesorías y servicios orientados a satisfacer necesidades concretas de
      los grupos sociales y de los sistemas productivos.</p>
    </div>
  </div>

  <div class="col-12" style="border-bottom: 1px solid gray">
    <div class="col-s-2"></div>
    <div class="col-s-4">
      <h2 class="featurette-heading">POLÍTICA DE LA CALIDAD</h2>
      <p class="lead textPoliticaCalidad" ALIGN="justify">Quienes participamos en el Sistema de Gestión de Calidad de la
      Universidad Michoacana de San Nicolás de Hidalgo, asumimos el
      compromiso de ofrecer servicios administrativos eficaces y oportunos
      en apoyo a la trayectoria escolar y al logro de los objetivos
      institucionales. Nos comprometemos a satisfacer los requisitos
      aplicables y mejorar continuamente la calidad de nuestros procesos.”</p>
    </div>

    <div class="col-s-4">
      <img class="featurette-image img-fluid mx-auto imgVision" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="img/CALIDAD.png">
    </div>
  </div>

  <div class="col-12" style="border-bottom: 1px solid gray">
    <div class="col-s-2"></div>
    <div class="col-s-4">
      <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="img/OBJETIVOS.png">
    </div>
    <div class="col-s-4">
      <h2 class="featurette-heading tituloObjetivosC" style="margin-top: ">OBJETIVOS DE LA CALIDAD</h2>
      <p class="lead">1.- A diciembre de 2020 establecer un sistema uniforme de
      comunicación de las áreas administrativas con los usuarios</p>
      <p class="lead">2.- A diciembre de 2020 reducir el tiempo de atención de los trámites
      relacionados con la trayectoria escolar</p>
      <p class="lead">3.- A enero de 2021 incrementar la satisfacción de los usuarios de los
      servicios administrativos de trayectoria escolar</p>
    </div>
  </div>
@stop