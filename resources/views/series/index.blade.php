<x-layout title="Séries" :mensagem-secusso="$mensagemSucesso">
   
    @auth
    <a href="{{ route('series.create') }}"  class="btn btn-dark mb-2">Nova Série</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $key => $serie)
            <li class="list-group-item d-flex justify-content-between aligm-items-center">
                
            <div class="d-flex justify-center">
                <img src="{{ asset('storage/' . $serie->capa_path) }}" class="img-thumbnail"
                style="width: 100px;">
            </div>

            
                @auth<a href="{{ route('temporada.index', $serie->id) }}">@endauth
                    {{ $serie->nome }}
                @auth</a>@endauth
                
                @auth
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
                @endauth
            </li>
        @endforeach
    </ul>

</x-layout>