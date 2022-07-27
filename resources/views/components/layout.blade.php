<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ $title }}</title>
</head>
<body>

    <!-- se o usuario estiver logado vai exibir -->
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home </a>
            
            <a class="navbar-brand" href="{{ route('logout') }}">Sair </a>
        </div>
    </nav>
    @endauth

    <!-- se o usuario nao estiver logado vai entrar nesse codigo -->
    @guest
        <a class="navbar-brand" href="{{ route('login') }}">Entrar</a>
    @endguest


    <div class="container">
        
        <h1>{{ $title }}</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset($mensagemSucesso)
            <div class="alert alert-success">
                    {{$mensagemSucesso}}
            </div>
        @endisset
        {{ $slot }}

    </div>
</body>
</html>