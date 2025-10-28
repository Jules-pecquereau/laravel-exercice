<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
      <h1>Univers</h1>

      <h1>{{__('Hello!')}} {{ Auth::user()->name ?? null}}</h1>


                        @if (auth::check() )

                            <button type="button" class="btn btn-danger "><a class="dropdown-item" href="/logout" >{{__('Log Out')}}</a></button>
                        @else

                            <button type="button" class="btn btn-primary "><a class="dropdown-item" href="/login" >{{__('Log in')}}</a></button>
                            <button type="button" class="btn btn-primary "><a class="dropdown-item" href="/register" >{{__('Register')}}</a></button>
                        @endif


                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
                        <a href="{{ url('/lang/fr') }}">Français</a>
                        <a href="{{ url('/lang/en') }}">English</a>
                        <a href="{{url('/test-mail')}}">envoyer un mail test</a>
                        @yield("content")


</body>
</html>
