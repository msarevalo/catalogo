@extends('plantilla')

<title>Catalogo | Cargos</title>

@section('formulario')
<div class="container">
    <form action="{{ route('cargo.editar', $cargo->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

            <div class="col-md-6">
                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ $cargo->nombreCargo }}" required autocomplete="cargo" autofocus>

                @error('cargo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="area" id="area" required>
                    @foreach($areas as $area)
                        @if($area->id==$cargo->area)
                            <option style="text-transform: capitalize" value="{{ $area->id }}" selected>{{ $area->nombreArea }}</option>
                        @else
                            <option style="text-transform: capitalize" value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="perfil" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="perfil" id="perfil" required>
                    @foreach($perfiles as $perfil)
                        @if($perfil->id==$cargo->perfil)
                            <option style="text-transform: capitalize" value="{{ $perfil->id }}" selected>{{ $perfil->nombrePerfil }}</option>
                        @else
                            <option style="text-transform: capitalize" value="{{ $perfil->id }}">{{ $perfil->nombrePerfil }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="estado" id="estado" required>
                    @if($cargo->estado==1)
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