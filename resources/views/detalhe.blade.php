@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalhe de Chamados</h2>
          @can('view', $chamado)
        Título: {{$chamado->titulo}}
        @else
          <h3> Você nao tem permissão paraa acessar a pagina
        @endcan
    </div>
</div>
@endsection
