<x-layout title="Editar Série '{{$serie->nome}}'">
    <x-serie.form action="{{route('series.update', $serie->id)}}" nome="{{$serie->nome}}">
    </x-serie.form>
</x-layout>