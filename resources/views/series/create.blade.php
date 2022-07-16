<x-layout title="Nova Série">
    <x-serie.form action="{{route('series.store')}}" :nome="old('nome')" :update="false">

    </x-serie.form>
</x-layout>