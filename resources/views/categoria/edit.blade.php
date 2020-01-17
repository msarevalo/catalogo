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
    <form action="{{ route('categoria.editar', $categoria->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

            <div class="col-md-6">
                <input id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ $categoria->categoria}}" required autocomplete="categoria" autofocus>

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
                <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="descripcion" autofocus maxlength="50" onpaste="contarcaracteres();" onkeyup="contarcaracteres();" rows="1">{{ $categoria->descripcion }}</textarea>
                <label id="res" style="color: #bbbbbb;">{{$largo}} / 50</label>

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
                        @if($categoria->area==$area->id)
                            <option selected style="text-transform: capitalize" value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                        @else
                            <option style="text-transform: capitalize" value="{{ $area->id }}">{{ $area->nombreArea }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

            <div class="col-md-6">
                <select class="form-control mb-2" name="estado" id="estado" required>
                    @if($categoria->estado==1)
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
    <script src="../../js/categoria.js"></script>
@endsection