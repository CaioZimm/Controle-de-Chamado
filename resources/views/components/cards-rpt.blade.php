@props(['rpt' => collect()])
<div>
    <h1 class="text-2xl font-bold text-white mb-4 border-b pb-2 border-white/30">Lista de RPTs</h1>

        @if($rpt->isEmpty())
            <p class="text-white bg-red-500/50 p-4 rounded-lg">Nenhum rpt encontrado.</p>
        @else
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 bg-white bg-opacity-90">
                    <thead class="bg-blue-500 text-white">
                        <tr> <!-- cabecalho da tabela-->
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Versão</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Clientes</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Segmento</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tela</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Link</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200"> <!-- conteudo da tabela-->
                        @foreach($rpt as $item)
                            <tr class="hover:bg-gray-400">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->versao }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->cliente }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->segmento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->tela }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><button>Clica aq</button></td>
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
