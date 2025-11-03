<main class="p-6">
    <div class="modal fade" id="modalDev" tabindex="-1" aria-labelledby="modalDevLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="{{ route('tarrpt.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDevLabel">Enviar Arquivos RPTs</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body space-y-4"> 
                        
                        <div class="flex flex-col">
                            <label class="font-semibold mb-1">Versão:</label>
                            <input type="text" name="versao" placeholder="Versão" 
                                class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold mb-1">Cliente:</label>
                            <input type="text" name="cliente" placeholder="Cliente" 
                                class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold mb-1">Segmento:</label>
                            <select name="segmento" class="form-select rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Selecione um segmento</option>
                                {{-- @foreach($segmentos as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach --}}
                                <option value="1">1 - Atacado</option> 
                                <option value="2">2 - Automotivo Revenda</option> 
                                <option value="3">3 - Automotivo Assistência</option> 
                                <option value="4">4 - Casa e Decoração</option> 
                                <option value="5">5 - Coveniencia</option> 
                                <option value="6">6 - EPI e SIGN</option> 
                                <option value="7">7 - Indústria</option> 
                                <option value="8">8 - Joelheria</option> 
                                <option value="9">9 - Lanchonetes, Pizzaria e Afins</option> 
                                <option value="10">10 - Material de Construção</option> 
                                <option value="11">11 - Mercado de Proximidade</option> 
                                <option value="12">12 - Moda</option> 
                                <option value="13">13 - Móveis e Eletro</option> 
                                <option value="14">14 - Ótica</option> 
                                <option value="15">15 - Perfumaria e Cosméticos</option> 
                                <option value="16">16 - Presentes, Papelaria e Outros</option> 
                                <option value="17">17 - Suplementos e Produtos Naturais</option> 
                                <option value="18">18 - Loja de Instrumentos Musicais e Acessórios</option> 
                                <option value="19">19 - Distribuidora de Bebidas</option> 
                                <option value="20">20 - Salões de Beleza e Barbearias</option> 
                                <option value="21">21 - Feiras e Exposições</option> 
                                <option value="22">22 - Franquedoras</option> 
                                <option value="23">23 - Retíficas e Manutenção Agrícola</option> 
                                <option value="24">24 - Contratos</option> 
                                <option value="25">25 - Parafusos</option> 
                                <option value="26">26 - E-Commerce</option> 
                                <option value="27">27 - Locação</option>
                                <option value="28">28 - Loja de Celulares</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold mb-1">Tela:</label>
                            <input type="text" name="tela" placeholder="Tela" 
                                class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="file" class="font-semibold mb-1">Escolha o arquivo:</label>
                            <input type="file" name="file" id="file" required 
                                class="form-control rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>
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
    </main>