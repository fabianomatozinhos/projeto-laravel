<x-layout title="Nova Série">
    <form action="{{route('series.store')}}" method="post">
        @csrf
        <div class="row" mb-3>
            
            <div class="col-6 mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" 
                type="text" 
                id="nome" 
                name="nome"
                value="{{old('nome')}}"
                autofocus
                >
            </div>
            <div class="col-3">
                <label class="form-label" for="numero-temporada">Nº Temporadas:</label>
                    <input class="form-control" 
                    type="number" 
                    id="numero-temporada" 
                    name="numero_temporada"
                    value="{{old('numero-temporada')}}"
                    >
            </div>
            <div class="col-3">
                <label class="form-label" for="eps-temporada">Eps / Temporada:</label>
                    <input class="form-control" 
                    type="number" 
                    id="eps-temporada" 
                    name="eps_temporada"
                    value="{{old('eps-temporada')}}"
                    >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>