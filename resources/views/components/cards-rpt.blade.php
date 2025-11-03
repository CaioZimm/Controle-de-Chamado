@props(['rpt' => collect()])
<div>
    <h1 class="text-2xl font-bold text-white mb-4 border-b pb-2 border-white/30">Lista de RPTs</h1>

    @if($rpt->isEmpty())
        <p class="text-white bg-red-500/50 p-4 rounded-lg">Nenhum rpt encontrado.</p>
    @else
        <div  styles="display: flex; aling-items: column;"   class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 bg-white bg-opacity-90">
                <thead class="bg-blue-500 text-white">
                    <tr> <!-- cabecalho da tabela-->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Versão</th>
                        <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Clientes</th> -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Segmento</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tela</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Data</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Arquivo</th> <!-- Alterado para mostrar o arquivo -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100"> <!-- conteudo da tabela-->
                    @foreach($rpt as $item)
                        <tr class="hover:bg-gray-200">
                            <td style="  " class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->versao }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->id_cliente }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->segmento }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->tela }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->data }}</td>

                            <!-- Exibição do arquivo com base no endereço -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-100">
                                  <a href="{{ Storage::url($item->endereco) }}" target="_blank" style=" border-radius: 3px;" class="bg-blue-500 text-blue-100 hover:bg-blue-800">Baixar RPT</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $rpt->links() }}
        </div>
    @endif
</div>
