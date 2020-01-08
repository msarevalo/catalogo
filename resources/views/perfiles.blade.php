@extends('plantilla')

<title>Catalogo | Perfiles</title>

@section('formulario')

<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Perfil</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($perfiles as $perfil)
        <tr>
            <th scope="row">{{$perfil->id}}</th>
            <td>
                <a href="#">
                    {{$perfil->nombrePerfil}}
                </a>
            </td>
            <td>
            	@if($perfil->estado==1)
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