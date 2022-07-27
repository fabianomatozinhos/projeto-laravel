<x-layout title="Novo usuário">
    <form  method="post" action="">
        @csrf

        <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" class="form-control" id="nome" name="name">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>

    </form>
</x-layout>