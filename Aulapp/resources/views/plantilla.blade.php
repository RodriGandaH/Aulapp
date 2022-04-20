<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>


  <link rel="stylesheet" href="{{asset('css/plantilla.css')}}" />
  <title>@yield('title')</title>

</head>

<body>


  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Aulapp</a>
        @yield('Titulo')
        <form class="d-flex">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          <a class="nav-link active" aria-current="page" href="#">DevSolutions</a>
        </form>
      </div>
    </nav>
  </header>
  <div id="Container" class="container-fluid">

    @csrf

    @yield('Contenido formulario')

  </div>
  <footer>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @yield('js')

</body>

</html>