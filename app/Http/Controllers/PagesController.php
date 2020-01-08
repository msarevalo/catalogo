<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //
    public function perfiles(){
    	$perfiles = App\Profile::all();

    	return view('perfiles', compact('perfiles'));
    }

    /*****************
    ********Areas*****
    *****************/

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


    public function cargos(){
    	$cargos = DB::table('positions')
    		->join('areas', 'areas.id', '=', 'positions.area')
    		->select('positions.id', 'positions.nombreCargo', 'areas.nombreArea','positions.estado')->get();

    	return view('cargos', compact('cargos'));
    }
}
