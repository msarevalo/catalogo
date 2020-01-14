@extends('plantilla')

<title>Catalogo | Usuarios</title>

@section('formulario')
<div class="container">
        <a href="{{ route('usuario.crea') }}" class="btn btn-primary">Crear Usuario</a>
    </div>
<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
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
                    {{$usuario->name}}
                </a>
            </td>
            <td>
                <a href="#">
                    {{$usuario->email}}
                </a>
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