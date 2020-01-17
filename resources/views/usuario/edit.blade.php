@extends('plantilla')

<title>Catalogo | Usuarios</title>

@section('formulario')
<div class="container">
    <form action="{{ route('usuario.editar', $usuario->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $usuario->nombres }}" required autocomplete="nombre" autofocus>

                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

            <div class="col-md-6">
                <input id="apellido" type="text" class="form-control @error('nombre') is-invalid @enderror" name="apellido" value="{{ $usuario->apellidos }}" required autocomplete="apellido" autofocus>

                @error('apellido')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

            <div class="col-md-6">
                <input id="mail" type="email" class="form-control @error('mail') is-invalid @enderror" name="mail" value="{{ $usuario->email }}" required autocomplete="mail" autofocus>

                @error('mail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2 input-lg dynamic" name="area" id="area" required data-dependent="area">
                    <option selected value="" disabled>Seleccione un area</option>
                    @foreach($areas as $area)
                        @if($cargo->area==$area->id)
                            <option style="text-transform: capitalize" selected value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                        @else
                            <option style="text-transform: capitalize" value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2 input-lg dynamic" name="cargo" id="cargo" required data-dependent="cargo">
                    <option selected value="" disabled>Seleccione un cargo</option>
                    @foreach($cargosArea as $cargoA)
                        @if($usuario->cargo==$cargoA->id)
                            <option style="text-transform: capitalize" selected value="{{ $cargoA->id }}">{{$cargoA->nombreCargo}}</option>
                        @else
                            <option style="text-transform: capitalize" value="{{ $cargoA->id }}">{{$cargoA->nombreCargo}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-7 text-md-right"><a href="{{ route('cargo.crea') }}">{{ __('Crear un cargo') }}</a></label>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="estado" id="estado" required>
                    @if($usuario->estado==1)
                        <option style="text-transform: capitalize" value="1" selected>Activo</option>
                        <option style="text-transform: capitalize" value="0">Inactivo</option>
                    @else
                        <option style="text-transform: capitalize" value="1">Activo</option>
                        <option style="text-transform: capitalize" value="0" selected>Inactivo</option>
                    @endif
                    </select>
                </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
        		    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script src="../../js/usuarios.js"></script>
@endsection