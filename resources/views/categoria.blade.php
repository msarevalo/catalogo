@extends('plantilla')

<title>Catalogo | Categorias</title>

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
        <a href="{{ route('categoria.crea') }}" class="btn btn-primary">Crear Categoria</a>
    </div>
<table class="table">
        <thead>
        <tr>
            <th scope="col-4">#</th>
            <th scope="col-4">Nombre Categoria</th>
            <th scope="col-4">Descripcion</th>
            <th scope="col-4">Area</th>
            <th scope="col-4">Estado</th>
            <th scope="col-4">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <th scope="row">{{$categoria->id}}</th>
            <td style="text-transform: uppercase;">
                <a href="#">
                    {{$categoria->categoria}}
                </a>
            </td>
            <td>
                {{ $categoria->descripcion }}
            </td>
            <td>
                {{ $categoria->nombreArea }}
            </td>
            <td>
            	@if($categoria->estado==1)
                    Activo
                @else
                	Inactivo
                @endif
            </td>
            <td>
                <a href="{{ route('categoria.edita', $categoria->id) }}" style="text-decoration: none">
                        <img src="../../img/edit.png" style="width: 8%" title="Editar">
                    </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection