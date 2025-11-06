

<div class="modal fade" id="modalClientes" tabindex="-1" aria-labelledby="modalClientesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- mudar a rota depois de criar o controller -->
        <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOrganizacaoLabel">Criar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body space-y-4">
                    <div class="flex flex-col">
                        <label class="font-semibold mb-1">Cliente:</label>
                        <input type="text" name="nome" placeholder="Nome do Cliente"
                            class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold mb-1">Cnpj:</label>
                        <input type="number" name="cnpj" placeholder="Não Obrigatorio"
                            class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex flex-col">
                        <x-select-segmentos-bootstrap>
                        </x-select-segmentos-bootstrap>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold mb-1">Organização:</label> 
                        <select name="id_organizacao" id="organizacao_id" class="form-control select2"> 
                            <option value="">Selecione a Organização</option>
                        </select>
                    </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
                        Enviar
                    </button>
                </div>
            </div>
        </form>
     </div>
</div>





