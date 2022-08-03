@component('mail::message')

#{{ $nomeSerie }} criada

A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas e {{ $episodiosPorTemporada }} episódios

Acesse aqui: 

@component('mail::button', ['url' =>  route('temporada.index', $idSerie)])
Visualizar
@endcomponent

    # uma nova serie foi criada 

    - Item 1
    - Item 2

@endcomponent