@props(['rpt' => collect()])
<div>
    <h1 class="text-2xl font-bold text-white mb-4 border-b pb-2 border-white/30">Lista de RPTs</h1>

    @if($rpt->isEmpty())
        <p class="text-white bg-red-500/50 p-4 rounded-lg">Nenhum rpt encontrado.</p>
    @else
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 bg-white bg-opacity-90">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Versão</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Segmento</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tela</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Data</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Arquivos RPts</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($rpt as $item)
                        <tr class="hover:bg-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{ $item->versao }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $item->segmento }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $item->tela }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $item->data }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ Storage::url($item->endereco) }}" target="_blank"
                                   style="
                                       display: inline-flex;
                                       align-items: center;
                                       gap: 6px;
                                       background: linear-gradient(135deg, #3b82f6, #1d4ed8);
                                       color: white;
                                       padding: 8px 16px;
                                       border-radius: 6px;
                                       text-decoration: none;
                                       font-weight: 500;
                                       font-size: 0.875rem;
                                       transition: all 0.3s ease;
                                       box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                                       border: none;
                                       cursor: pointer;
                                   "
                                   onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.2)';"
                                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                    Baixar RPT
                                </a>
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
