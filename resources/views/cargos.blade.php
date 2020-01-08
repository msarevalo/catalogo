@extends('plantilla')

<title>Catalogo | Cargos</title>

@section('formulario')
<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Cargo</th>
            <th scope="col">Area</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
        <tr>
            <th scope="row">{{$cargo->id}}</th>
            <td>
                <a href="#">
                    {{$cargo->nombreCargo}}
                </a>
            </td>
            <td>
            	{{$cargo->nombreArea}}
            </td>
            <td>
            	@if($cargo->estado==1)
                    Activo
                @else
                	Inactivo
                @endif
            </td>
            <td>
                <a href="#" style="text-decoration: none">
                        <img src="../../img/edit.png" style="width: 5%" title="Editar">
                    </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection