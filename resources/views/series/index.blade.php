<x-layout title="Séries">
    <a href="/series/criar" target="_blank" class="btn btn-dark mb-2">Nova Série</a>
    <ul class="list-group">
        @foreach ($series as $key => $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>

</x-layout>