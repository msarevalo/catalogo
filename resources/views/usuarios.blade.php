@extends('plantilla')

<title>Catalogo | Usuarios</title>

@section('formulario')
@if(session('exito'))
        <div class="alert alert-success">
            {{session('exito')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="container">
        <a href="{{ route('usuario.crea') }}" class="btn btn-primary">Crear Usuario</a>
    </div>
<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Area</th>
            <th scope="col">Cargo</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <th scope="row">{{$usuario->id}}</th>
            <td>
                <a href="#">
                    {{$usuario->nombres}} {{$usuario->apellidos}}
                </a>
            </td>
            <td>
                <a href="mailto:{{$usuario->email}}">
                    {{$usuario->email}}
                </a>
            </td>
            <td>
                @foreach($cargos as $cargo)
                    @if($cargo->id==$usuario->cargo)
                        {{$cargo->nombreArea}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($cargos as $cargo)
                    @if($cargo->id==$usuario->cargo)
                        {{$cargo->nombreCargo}}
                    @endif
                @endforeach
            </td>
            <td>
                @if($usuario->estado==1)
                    Activo
                @else
                    Inactivo
                @endif
            </td>
            <td>
                <a href="{{ route('usuario.edita', $usuario->id) }}" style="text-decoration: none">
                        <img src="../../img/edit.png" style="width: 10%" title="Editar">
                    </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection