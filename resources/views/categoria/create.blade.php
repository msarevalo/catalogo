@extends('plantilla')

<title>Catalogo | Categorias</title>

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
    <form action="{{ route('categoria.crear') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

            <div class="col-md-6">
                <input id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}" required autocomplete="categoria" autofocus>

                @error('categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

            <div class="col-md-6">
                <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus maxlength="50" onpaste="contarcaracteres();" onkeyup="contarcaracteres();" rows="1"></textarea>
                <label id="res" style="color: #bbbbbb;">0 / 50</label>

                @error('descripcion')
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
    <script src="../js/categoria.js"></script>
@endsection