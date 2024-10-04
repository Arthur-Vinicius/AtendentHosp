<table class="table table-bordered">
    <thead>
        <tr class=" text-center">
            <th>Nome</th>
            <th>Email</th>
            <th>Status</th>
            <th class="d-flex justify-content-center"><i class="bi bi-lightning-fill"></i></th>
        </tr>
    </thead>
    <tbody>
        {{-- Loop para exibição de usuários cadastrados no sistema. Dados vindos da UserController --}}
        @foreach ($user as $user)
            <tr>
                <td class=" text-center"><a type="text" href="{{ route('user.showUserInfos', $user->id) }}"
                        class="corTextoVerde">{{ $user->name }}</a></td>
                <td class=" text-center">{{ $user->email }}</td>
                <td class=" text-center ">
                    {{-- Exibição de estatus do usuario verificando pelo valor 0 ou 1 --}}
                    {{-- Se o valor for 1 o background fica verde, se não for fica vermelho. --}}
                    <div class="status-box @if ($user->status == 1) bg-green @else bg-red @endif">
                        {{-- Se o valor for 1 o usuario está ativo, se não for o usuario está inativo. --}}
                        @if ($user->status == 1)
                            Ativo
                        @else
                            Inativo
                        @endif
                    </div>
                </td>
                <td class="d-flex justify-content-center">
                    {{-- Os botoes chaman os respectivos modais para edição ou deleção de usuarios, o is é informado ao modal pelo data-bs-target --}}
                    <button type="button" class=" me-1 btn btn-success modal-trigger" data-bs-toggle="modal"
                        data-bs-target="#modaluseredit{{ $user->id }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    @include('users.modal.modal_user_edit')

                    <button type="button" class="btn btn-danger modal-trigger" data-bs-toggle="modal"
                        data-bs-target="#modaluserdelete{{ $user->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                    @include('users.modal.modal_user_delete')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
