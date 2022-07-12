<x-layout title="Nova Série">

    <form action="/series/salvar" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" id="nome" name="nome">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</x-layout>