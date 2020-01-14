@extends('plantilla')

<title>Catalogo | Areas</title>

@section('formulario')
<div class="container">
    <form action="{{ route('area.editar', $area->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

            <div class="col-md-6">
                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ $area->nombreArea }}" required autocomplete="area" autofocus>

                @error('area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="estado" id="estado" required>
                    @if($area->estado==1)
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