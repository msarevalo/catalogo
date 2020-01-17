@extends('plantilla')

<title>Catalogo | Areas</title>

@section('formulario')
<div class="container">
    <form action="{{ route('area.crear') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

            <div class="col-md-6">
                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>

                @error('area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="sigla" class="col-md-4 col-form-label text-md-right">{{ __('Sigla') }}</label>

            <div class="col-md-6">
                <input id="sigla" type="text" class="form-control @error('sigla') is-invalid @enderror" name="sigla" value="{{ old('sigla') }}" required autocomplete="sigla" autofocus>

                @error('sigla')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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