@extends('plantilla')
@section('titulo')
: notas
@stop

@section('cuerpo')
<a class="btn btn-info" href="{{ route('nota.aniadir' , ['idTab' => $idTab]) }}">Nueva nota</a>
<a class="btn btn-light" href="{{ route('tablero.ver') }}">Volver</a>
<table class="table mt-3">
  <thead>

    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Fecha</th>
      <th>Completado</th>
      <th></th>
      <th></th>
    </tr>

  </thead>
  <tbody>

    @foreach( $notas as $item)

    <tr>

      <td>{{ $item->idNot }}</td>
      <td>{{ $item->texto }}</td>
      <td>@df($item)</td>
      <td>

        @if($item->completado)
          <span class="badge badge-success">Completada</span>
        @else
          <span class="badge badge-danger">No completada</span>
        @endif

      </td>

      <td>
        <a href="{{ route('nota.editar' ,  ['idNot'  => $item->idNot,
                                            'idTab'  => $item->idTab ])}}" class="btn btn-sm btn-success">Editar</a>
      </td>
      <td>
        <a href="" class="btn btn-sm btn-danger">Borrar</a>
      </td>

    </tr>
    @endforeach

  </tbody>

</table>

@stop