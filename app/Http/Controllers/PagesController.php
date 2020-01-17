<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App;

class PagesController extends Controller
{
    //
    public function perfiles(){
    	$perfiles = App\Profile::all();

    	return view('perfiles', compact('perfiles'));
    }

    /********************************************************************************
    ********Areas********************************************************************
    ********************************************************************************/

    public function areas(){
    	$areas = App\Area::all();

    	return view('areas', compact('areas'));
    }

    public function creaArea(){
        return view('area.create');
    }

    public function crearArea(Request $request){
        $verificacion = App\Area::where('nombreArea', '=', $request->area)->first();

        if ($verificacion==null) {
            $area = new App\Area;
            $area->nombreArea=$request->area;
            $area->sigla=$request->sigla;

            $area->save();

            return redirect('area')->with('exito', 'El area ' . $request->area . ' fue creada con exito');
        }else{
            return redirect('area')->with('error', 'El area ' . $request->area . ' ya existe');
        }
    }

    public function editaArea($id){
        $area = App\Area::findOrFail($id);

        return view('area.edit', compact('area'));
    }

    public function editarArea(Request $request, $id){
        $area = App\Area::findOrFail($id);

        $area->nombreArea=$request->area;
        $area->sigla=$request->sigla;
        $area->estado=$request->estado;

        $area->save();

        return redirect('area')->with('exito', 'El area ' . $area->nombreArea . ' se ha editado con exito');
    }

    /********************************************************************************
    ********Cargos********************************************************************
    ********************************************************************************/


    public function cargos(){
    	$cargos = DB::table('positions')
    		->join('areas', 'areas.id', '=', 'positions.area')
            ->join('profiles', 'profiles.id', '=', 'positions.perfil')
    		->select('positions.id', 'positions.nombreCargo', 'areas.nombreArea', 'profiles.nombrePerfil', 'positions.estado')->get();

    	return view('cargos', compact('cargos'));
    }

    public function creaCargo(){
        $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();
        $perfiles = App\Profile::where('estado', '=', '1')->orderBy('nombrePerfil', 'asc')->get();

        return view('cargo.create', compact('areas', 'perfiles'));
    }

    public function crearCargo(Request $request){
        $cargo = new App\Position;
        $cargo->nombreCargo=$request->cargo;
        $cargo->area=$request->area;
        $cargo->perfil=$request->perfil;

        $cargo->save();

        return redirect('cargo')->with('exito', 'El cargo ' . $request->cargo . ' fue creado con exito');
    }

    public function editaCargo($id){
        $cargo = App\Position::findOrFail($id);
        $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();
        $perfiles = App\Profile::where('estado', '=', '1')->orderBy('nombrePerfil', 'asc')->get();

        return view('cargo.edit', compact('cargo', 'areas', 'perfiles'));
    }

    public function editarCargo(Request $request, $id){
        $cargo = App\Position::findOrFail($id);

        $cargo->nombreCargo=$request->cargo;
        $cargo->area=$request->area;
        $cargo->perfil=$request->perfil;
        $cargo->estado=$request->estado;

        $cargo->save();

        return redirect('cargo')->with('exito', 'El cargo ' . $cargo->nombreCargo . ' se ha editado con exito');
    }

    /********************************************************************************
    ********Usuarios*****************************************************************
    ********************************************************************************/

    public function usuarios(){
        $usuarios = App\User::paginate(5);
        $cargos = DB::table('positions')
            ->join('areas', 'areas.id', '=', 'positions.area')
            ->select('positions.id', 'positions.nombreCargo', 'areas.nombreArea')->get();

        return view('usuarios', compact('usuarios', 'cargos'));
    }

    public function creaUser(){
        $cargos = App\Position::where('estado', '=', '1')->first();

        if($cargos!==null){
            $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();

            return view('usuario.create', compact('areas'));
        }else{
            
            $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();
            $perfiles = App\Profile::where('estado', '=', '1')->orderBy('nombrePerfil', 'asc')->get();

            return redirect ('cargo')->with('error', 'Es necesario un cargo activo para poder crear un usuario');
        }
        
    }

    public function cargosAreas($id){
        return App\Position::where([['area', '=', $id], ['estado', '=', '1']])->select('id', 'nombreCargo')->orderBy('nombreCargo', 'asc')->get();

    }

    public function crearUsuario(Request $request){
        $usuario = new App\User;
        $usuario->nombres=$request->nombre;
        $usuario->apellidos=$request->apellido;
        $usuario->email=$request->mail;
        $usuario->cargo=$request->cargo;
        $usuario->password=Hash::make($request['loyalquo2020']);

        $usuario->save();

        return redirect('usuario')->with('exito', 'El usuario ' . $request->nombre . $request->apellido . ' fue creado con exito');
    }

    public function editaUsuario($id){
        $usuario = App\User::findOrFail($id);

        $cargos = App\Position::where('estado', '=', '1')->first();

        if($cargos!==null){
            $cargo = App\Position::where('id', '=', $usuario->cargo)->first();

            $cargosArea = App\Position::where([['estado', '=', '1'], ['area', '=', $cargo->area]])->get();

            $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();

            return view('usuario.edit', compact('usuario', 'areas', 'cargo', 'cargosArea'));
        }else{
            
            $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();
            $perfiles = App\Profile::where('estado', '=', '1')->orderBy('nombrePerfil', 'asc')->get();

            return redirect ('cargo')->with('error', 'Es necesario un cargo activo para poder crear un usuario');
        }
  
    }

    public function editarUsuario(Request $request, $id){
        $usuario = App\User::findOrFail($id);

        $usuario->nombres=$request->nombre;
        $usuario->apellidos=$request->apellido;
        $usuario->email=$request->mail;
        $usuario->cargo=$request->cargo;
        $usuario->estado=$request->estado;

        $usuario->save();

        return redirect('usuario')->with('exito', 'El usuario ' . $usuario->nombres . ' ' . $usuario->apellidos . ' se ha editado con exito');
    }

    
    /********************************************************************************
    ********Cargos********************************************************************
    ********************************************************************************/

    public function categorias(){

        $categorias = DB::table('case_categories')
            ->join('areas', 'areas.id', '=', 'case_categories.area')
            ->select('case_categories.id', 'case_categories.categoria', 'case_categories.descripcion','areas.nombreArea', 'case_categories.estado')->get();

        return view('categoria', compact('categorias'));
    }  

    public function creaCategoria(){
        $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();

        return view('categoria.create', compact('areas'));
    }  

    public function crearCategoria(Request $request){
        $categoria = new App\CaseCategory;
        $categoria->categoria=$request->categoria;
        $categoria->descripcion=$request->descripcion;
        $categoria->area=$request->area;

        $categoria->save();

        return redirect('categoria')->with('exito', 'La categoria ' . $request->nombre . $request->apellido . ' fue creado con exito');
    }

    public function editaCategoria($id){
        $categoria = App\CaseCategory::findOrFail($id);
        $areas = App\Area::where('estado', '=', '1')->orderBy('nombreArea', 'asc')->get();

        $largo = strlen($categoria->descripcion)-1;
        
        return view('categoria.edit', compact('categoria', 'areas', 'largo'));
    }

    public function editarCategoria(Request $request, $id){
        $categoria = App\CaseCategory::findOrFail($id);

        $categoria->categoria=$request->categoria;
        $categoria->descripcion=$request->descripcion;
        $categoria->area=$request->area;
        $categoria->estado=$request->estado;

        $categoria->save();

        return redirect('categoria')->with('exito', 'La categoria ' . $categoria->categoria . ' se ha editado con exito');
    }


}
