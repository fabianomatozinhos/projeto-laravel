<x-layout title="Login" >
    <form  method="post" action="">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Entrar</button>
        <a href="{{ route('user.create') }}" class="btn btn-secondary mt-3"> Registrar</a>
    </form>
</x-layout>