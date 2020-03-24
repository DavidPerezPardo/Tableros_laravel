@extends('plantilla')
@section('titulo')
: notas
@stop

@section('cuerpo')
<a class="btn btn-light" href="{{ route('tablero.ver') }}">Volver</a>

<table class="table mt-3">
  <thead>

    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Fecha</th>
      <th>Completado</th>
    </tr>

  </thead>
  <tbody>

    @foreach( $notas as $item)
    <tr>
      <td>{{ $item->idNot }}</td>
      <td>{{ $item->texto }}</td>
      <td>@df($item)</td>
      <td>{{ $item->completado }}</td>
    </tr>
    @endforeach

  </tbody>

</table>

@stop