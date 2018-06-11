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
    <h1>Aula : {{$aula->nombre}}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/modificarAulaPost" method="POST">
    {{csrf_field()}}

    <input name="id" type="hidden" class="form-control" id="id" value="{{$aula->id}}">
    <div class="form-group">
            <label for="nombre">Nombre:</label>
            
                <input name="nombre" type="name" class="form-control" id="name"
                @if(count($errors) == 0))
                 value="{{$aula->nombre}}"
                @else
                value="{{old('nombre')}}"
            @endif
                >
        </div>
    	<input type="submit" class="btn btn-primary" value="Enviar"/><br/>
    </body>
</html>