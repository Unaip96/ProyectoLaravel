<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    </head>
    <body>
    <h1>Usuarios</h1>

    @if(count($usuarios)==0)
        <p>No existen usuarios en este momento</p>

     @else
        <table class="table table-stripped">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Aulas</th>
            <th>Opciones</th>

            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre}}</td>
                    <td>{{ $usuario->apellido}}</td>
                    <td>{{ $usuario->dni}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->edad}}</td>
                    <td>
                        <ul>
                            @php($strAulas="")
                            @foreach($usuario->aulas as $aula)

                                <li>{{$aula->nombre}}
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="/modificar/{{$usuario->dni}}" class="btn btn-warning" role="button">Modificar</a>
                        <a href="/eliminar/{{$usuario->dni}}" class="btn btn-danger" role="button">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    <a href="/insert" class="btn btn-success" role="button">Crear Usuario</a>



    <h3>Aulas</h3>

    @if(count($aulas)==0)
        <p>No existen aulas en este momento</p>

     @else
        <table class="table table-stripped">
            <th>Aula</th>
            <th>Equipos</th>
            <th>Opciones</th>

            @foreach($aulas as $aula)
                <tr>
                    <td>{{ $aula->nombre}}</td>
                    <td>
                        <ul>
                            @foreach($aula->equipos as $equipo)
                                <li>{{$equipo->nombre}}
                            @endforeach

                        </ul>
                    </td>
                    <td>
                        <a href="/modificarAula/{{$aula->id}}" class="btn btn-warning" role="button">Modificar</a>
                        <a href="/eliminarAula/{{$aula->id}}" class="btn btn-danger" role="button">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    <a href="/insertAula" class="btn btn-success" role="button">Crear Aula</a>

    
    </body>
</html>