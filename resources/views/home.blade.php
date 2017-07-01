@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Lista de Chamados</h2>

        @can('create', App\Chamado::class)
        <p>Criar chamado </p>
        @endcan

        @forelse($chamados as $key => $value)
          <p>{{$value->titulo}}
            @can('view', $value)
              @can('update',$value)
                <a href="/home/{{$value->id}}">Editar</a>
              @endcan
              @can('delete',$value)
                <a href="/home/{{$value->id}}">Deletar</a>
              @endcan
            @endcan
          </p>
        @empty
          <p> Não existem chamados!! </p>
        @endforelse
    </div>
</div>
@endsection
