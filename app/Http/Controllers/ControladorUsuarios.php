<?php

namespace App\Http\Controllers;
use App\Usuario;
use App\Aula;
use App\AulasUsuarios;

use Illuminate\Http\Request;
use DB;

class ControladorUsuarios extends Controller
{
    public function cargarFormulario()
    {
    	return view('formulario');
    }
    public function mostrarDatos(Request $request)
    {
        echo $request->input('dni').'<br/>';
    	echo $request->input('nombre').'<br/>';
    	echo $request->input('apellido').'<br/>';
    	echo $request->input('email').'<br/>';
    	echo $request->input('edad').'<br/>';
    }



    public function cargarCrud()
    {
        //Select
        //$usuarios = Usuario::select()->paginate(100);
        //OrderBy
        $usuarios = Usuario::orderBy('nombre','ASC')->paginate(100);
        $aulas = Aula::orderBy('nombre','ASC')->paginate(100);


        return view('crud', ['usuarios' => $usuarios, 
            'aulas' => $aulas]);
    }





    public function eliminarUsuario(String $dni){

        DB::table('usuario')->where('dni','=',$dni)->delete();

        return redirect('');
    }
    public function modificar(String $dni){

        $usuario = Usuario::where('dni','=',$dni)->first();
        $aulas = Aula::orderBy('nombre','ASC')->paginate(100);
        $aulasUsuario = $usuario->aulas();

        if($usuario!=null){
            return view('modificar')->with(['usuario'=>$usuario,
                'aulas'=>$aulas,
                'aulasUsuario'=>$aulasUsuario]
            );
        }
        else{
            return redirect('');
        }
    }
    public function modificarUsuario(Request $request){
        //modificar usuario
        $dni = $request->input('dni');
        $usuario = Usuario::where('dni','=',$dni)->first();

        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'dni' => 'required|exists:usuarios,dni',
            'email' => 'required|email|max:200',
            'edad' => 'required|integer',
        ]);
        $nombre=strval($request->input('nombre'));
        $apellido=strval($request->input('apellido'));
        $email=strval($request->input('email'));
        $edad=strval($request->input('edad'));
        $dniAux=strval($request->input('dniAux'));
        $usuario->nombre=$nombre;
        $usuario->apellido = $apellido;
        $usuario->email = $email;
        $usuario->edad = $edad;

        if($dniAux != "")
            $usuario->dni = $dniAux;

        $usuario->save();

//modificar aulas

        $strAddAulas=$request->input('addAulas');
        $strDeleteAulas=$request->input('deleteAulas');
        if($strAddAulas  != ""){
            $addAulas = explode(",", $strAddAulas);
            foreach($addAulas as $aula_id){
                //$aulasUsuario = new aulasUsuario($usuario->id, $aula->id);
                //$aulasUsuario->save();
                if($aula_id != "")
                    DB::table('aula_usuario')->insert(
                    ['usuario_id' => $usuario->id, 'aula_id' => $aula_id]);
            }
        }
        
        if($strDeleteAulas != ""){
            $deleteAulas = explode(",", $strDeleteAulas);
            foreach($deleteAulas as $aula_id){
                DB::table('aula_usuario')->where('usuario_id','=',$usuario->id)->where('aula_id','=',$aula_id)->delete();
            }
        }
        


        return redirect('');

    }
    public function cargarFormularioInsert()
    {
        $aulas = Aula::orderBy('nombre','ASC')->paginate(100);
        
        return view('insert')->with(['aulas' => $aulas]);
    }
    public function insertUsuario(Request $request)
    {
        $usuario = new Usuario($request->all());


        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'dni' => 'required|unique:usuarios,dni',
            'email' => 'required|email|max:200',
            'edad' => 'required|integer',
        ]);

        $usuario->dni;
        $usuario->nombre;
        $usuario->apellido;
        $usuario->email;
        $usuario->edad;

        $usuario->save();
        $dni = $usuario->dni;
        $usuario = Usuario::where('dni','=',$dni)->first();
        
        $strAddAulas=$request->input('addAulas');
        if($strAddAulas  != ""){
            $addAulas = explode(",", $strAddAulas);
            foreach($addAulas as $aula_id){
                if($aula_id != "")
                    DB::table('aula_usuario')->insert(
                    ['usuario_id' => $usuario->id, 'aula_id' => $aula_id]);
            }
        }

        return redirect('');
    }

    //aulas

    public function cargarInsertAula()
    {
        
        return view('insertAula');
    }
    public function insertAulaPost(Request $request)
    {
        $aula = new Aula($request->all());


        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $aula->nombre;

        $aula->save();


        return redirect('');
    }

    public function modificarAula($id){

        $aula = Aula::where('id','=',$id)->first();

        if($aula!=null){
            return view('modificarAula')->with('aula',$aula);
        }
        else{
            return redirect('');
        }
    }
    public function modificarAulaPost(Request $request){
        $id = $request->input('id');
        $aula = Aula::where('id','=',$id)->first();;

        $request->validate([
            'nombre' => 'required|max:100',
        ]);
        $nombre=strval($request->input('nombre'));

        $aula->nombre=$nombre;


        $aula->save();
        return redirect('');

    }
    public function eliminarAula(String $id){

        Aula::where('id','=',$id)->delete();

        return redirect('');
    }
}
