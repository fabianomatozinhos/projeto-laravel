<x-layout title="Editar Série '{{$serie->nome}}'">
    <x-serie.form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true">
    </x-serie.form>
</x-layout>