<x-layout title="Temporadas de {{$series->nome}}">
    <ul class="list-group">
        @foreach ($temporadas as $key => $temporada)
            <li class="list-group-item d-flex justify-content-between aligm-items-center">
                <a href="{{ route('episodio.index', $temporada->id)}}">Episodios</a>
                Temporada {{ $temporada->numero }}
                
                <span class="badge bg-secondary">
                   <!-- {{$temporada->episodio()->assistido()->count()}} // {{$temporada->episodio->count()}} -->
                    
                    <!-- {{ $temporada->episodio->filter(fn ($episodio) => $episodio->assistido)->count() }} / {{$temporada->episodio->count()}} -->

                    {{$temporada->numeroDeEpisodiosAssistido()}} / {{$temporada->episodio->count()}}
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>