@extends('plantilla')

<title>Catalogo | Areas</title>

@section('formulario')
@if(session('exito'))
        <div class="alert alert-success">
            {{session('exito')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="container">
        <a href="{{ route('area.crea') }}" class="btn btn-primary">Crear Area</a>
    </div>
<table class="table">
        <thead>
        <tr>
            <th scope="col-4">#</th>
            <th scope="col-4">Nombre Area</th>
            <th scope="col-4">Sigla</th>
            <th scope="col-4">Estado</th>
            <th scope="col-4">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
        <tr>
            <th scope="row">{{$area->id}}</th>
            <td style="text-transform: uppercase;">
                <a href="#">
                    {{$area->nombreArea}}
                </a>
            </td>
            <td>
                {{$area->sigla}}
            </td>
            <td>
            	@if($area->estado==1)
                    Activo
                @else
                	Inactivo
                @endif
            </td>
            <td>
                <a href="{{ route('area.edita', $area) }}" style="text-decoration: none">
                        <img src="../../img/edit.png" style="width: 5%" title="Editar">
                    </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection