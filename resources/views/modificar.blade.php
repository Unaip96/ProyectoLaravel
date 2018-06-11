<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
    <h1>Usuario con DNI {{$usuario->dni}}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/modificarUsuario" method="POST">
    {{csrf_field()}}

    <input name="dni" type="hidden" class="form-control" id="dni" value="{{$usuario->dni}}">
    <div class="form-group">
            <label for="nombre">Nombre:</label>
            
                <input name="nombre" type="name" class="form-control" id="name"
                @if(count($errors) == 0))
                 value="{{$usuario->nombre}}"
                @else
                value="{{old('nombre')}}"
            @endif
                >
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input name="apellido" type="text" class="form-control" id="apellido" value="{{$usuario->apellido}}">
        </div>
        <div class="form-group">
            <label for="dniAux">DNI:</label>
            <input name="dniAux" type="text" class="form-control" id="dniAux" value="{{$usuario->dni}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input name="email" type="text" class="form-control" id="email" value="{{$usuario->email}}">
        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input name="edad" type="text" class="form-control" id="edad" value="{{$usuario->edad}}">
        </div>

            <label for="aulas">Aulas:</label>
        <div id="aulas" class="form-group">
            @php($i=0)
            @foreach($aulas as $aula)
                @php($i++)
                <div class="form-check form-check-inline">
                  <input class="checkbox" type="checkbox" id="inlineCheckbox{{$i}}" value="{{$aula->id}}">
                  <label class="form-check-label" for="inlineCheckbox{{$i}}">{{$aula->nombre}}</label>
                </div>
            @endforeach
        </div>
        
        <br/>
        <input type="hidden" value="" id="addAulas" name="addAulas"/>
        <input type="hidden" value="" id="deleteAulas" name="deleteAulas"/>
    	<input type="submit" class="btn btn-primary" value="Enviar"/>
    </form>
    </body>


    <script type="text/javascript">
        $( document ).ready(function() {
            aulasInit="";
            @foreach($usuario->aulas as $aulaUsuario)

                $("[value={{$aulaUsuario->id}}]").attr('checked', true);
                aulasInit += {{$aulaUsuario->id}} + ",";
            @endforeach
        });

        $(".checkbox").click(function(){
            addAulas="";
            deleteAulas="";
            i=0;
            @foreach($aulas as $aula)
                i++;
                checkbox = $("#inlineCheckbox"+i.toString());
                if(checkbox.is(':checked')){
                    if(!aulasInit.includes(checkbox.val()+','))
                        addAulas += checkbox.val()+',';
                }else{
                    if(aulasInit.includes(checkbox.val()+','))
                    deleteAulas += checkbox.val()+',';
                }
            @endforeach
            $("#addAulas").val(addAulas);
            $("#deleteAulas").val(deleteAulas);
        });
    </script>
</html>