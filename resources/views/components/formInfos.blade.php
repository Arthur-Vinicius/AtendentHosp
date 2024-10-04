<form method="post" action="{{ route('user.update', $user->id) }}">

    {{-- Token de validação para envio de dados pelo post --}}
    @csrf

    @method('put')
    <div class="mb-3">
        <label for="name" class="form-label ">Nome:</label>
        {{-- O nome do usuário é inserido automaticamente no campo input puxado pelo value. --}}
        <input type="text" class="form-control" id="name" name="name"
            value="{{ $user->name }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        {{-- O email do usuário é inserido automaticamente no campo input puxado pelo value. --}}
        <input type="email" class="form-control" id="email" name="email"
            value="{{ $user->email }}">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" class="form-control cpfRegex" maxlength="14" id="cpf" name="cpf" value="{{ $user->cpf }}">
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Senha:</label>
        {{-- Para fins de estetica o placeholder exibe os simbulos asteriscos, porem não é passada a senha no campo input. --}}
        <input type="password" class="form-control" id="pass" name="password"
            placeholder="***********">
    </div>
    <div class="mb-3 mb-3 col-lg-6 col-md-12 ">
        <input class="form-check-input" type="checkbox" id="status" name="status" value="1" @if($user->status) checked @endif>
        <label class="form-check-label" for="status">
            Usuário ativo
        </label>
    </div>
    <div class="col-12 d-flex flex-row-reverse">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</form>
{{-- Formatador de cpf pontos e hifen --}}
<script type="text/javascript" src="{{ asset('js\formataCpf.js') }}"></script>
