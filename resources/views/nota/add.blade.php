@extends('plantilla')
@section('titulo')
: notas
@stop

@section('cuerpo')

<form class="mt-4" action="{{ route('nota.aniadir') }}" method="post">

  @csrf
  <input type="hidden" name="idTab" value="{{ $idTab }}">
  
  @isset($nota)
    <input type="hidden" name="idNot" value="{{ $nota->idNot }}">
  @endisset

  <div class="row">
    <div class="col-sm-12">

      <label for="texto">Texto de la nota:</label>
      <textarea name="texto" class="w-100" id="texto" 
      rows="5" required>@isset($nota) {{ $nota->texto }} @endisset</textarea>

    </div>
  </div>

  <div class="row mt-2">
    <div class="col-sm-3">
      
      <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" id="fecha"
       value=@isset($nota) {{ $nota->fecha }} @endisset> 

    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-4">

      <label for="estado">Estado:</label>
      <select class="custom-select" name="estado" id="estado">
        <option value="0">
          No Completado
        </option>
        <option value="1">
          Completado
        </option>

      </select>   
      <input type="submit" class="btn btn-info mt-4" value="Guardar">
      <a href="{{ route('nota.ver' , ['id' => $idTab ]) }}" type="submit" class="btn btn-danger mt-4">Cancelar</a>

    </div>
  </div>


</form>

@stop