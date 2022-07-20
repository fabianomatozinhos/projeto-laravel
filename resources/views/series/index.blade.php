<x-layout title="Séries">
    <a href="{{ route('series.create') }}"  class="btn btn-dark mb-2">Nova Série</a>
   
    @isset($mensagemSucesso)
   <div class="alert alert-success">
        {{$mensagemSucesso}}
   </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $key => $serie)
            <li class="list-group-item d-flex justify-content-between aligm-items-center">
                <a href="{{ route('temporada.index', $serie->id) }}">{{ $serie->nome }}</a>
                
                <span class="d-flex">

                    <a href="{{route('series.edit', $serie->id)}}" class="btn btn-info btn-sm">Editar</a>
                    
                    <form action="{{route('series.destroy', $serie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm  ms-2">
                            Deletar
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>