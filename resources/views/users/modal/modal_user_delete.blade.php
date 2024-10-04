<div class="modal fade" id="modaluserdelete{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modaluserdeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center text-center">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modaluseredeleteLabel">Deletar usuário
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="bi bi-info-circle tamanho-icone-grande"></i>
                <h2>Você tem certeza?</h2>
                <p>Essa ação não pode ser desfeita.</p>
                <div class="d-flex justify-content-center">
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="me-1 col-4">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary col-12">Deletar</button>
                    </form>
                    <form href="{{ route('user.list') }}" class=" col-4">
                        <button type="submit" class="ms-1 btn btn-danger col-12">cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
