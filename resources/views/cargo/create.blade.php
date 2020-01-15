@extends('plantilla')

<title>Catalogo | Cargos</title>

@section('formulario')

    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="container">
    <form action="{{ route('cargo.crear') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

            <div class="col-md-6">
                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ old('cargo') }}" required autocomplete="cargo" autofocus>

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
                    <option value="0" selected disabled>Seleccione un Area</option>
                    @foreach($areas as $area)
                        <option style="text-transform: capitalize" value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="perfil" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="perfil" id="perfil" required>
                    <option value="0" selected disabled>Seleccione un perfil</option>
                    @foreach($perfiles as $perfil)
                        <option style="text-transform: capitalize" value="{{ $perfil->id }}">{{ $perfil->nombrePerfil }}</option>
                    @endforeach
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