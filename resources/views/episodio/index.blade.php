<x-layout title="Episodios" :mensagem-secusso="$mensagemSucesso">
    <form method="post" >
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $key => $episodio)
            <li class="list-group-item d-flex justify-content-between aligm-items-center">
                Episódio {{ $episodio->numero }}
                <input type="checkbox" 
                    name="episodios[]" 
                    value="{{$episodio->id}}"
                    @if($episodio->assistido) checked @endif/>
            </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-3 mb-2">Salvar</button>
    </form>
</x-layout>