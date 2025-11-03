@props(['rpt' => collect(), 'segmentos' => []])

<div class="rpt-container">
    <h1 class="titulo">Lista de RPTs</h1>

    @if($rpt->isEmpty())
        <p class="alerta">Nenhum rpt encontrado.</p>
    @else
        <div class="tabela-wrapper">
            <table class="tabela-rpt">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="col-versao">Versão</th>
                        <th>Clientes</th>
                        <th>Segmento</th>
                        <th>Tela</th>
                        <th>Data</th>
                        <th class="col-acoes">Arquivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rpt as $item)
                        <tr>
                            <td>{{ $item->nome }}</td>
                            <td class="col-versao">{{ $item->versao }}</td>
                            <td>{{ $item->cliente }}</td>
                            <td>
                                {{-- ✅ CONVERTE NÚMERO PARA NOME DO SEGMENTO --}}
                                @isset($segmentos[$item->segmento])
                                    {{ $segmentos[$item->segmento] }}
                                @else
                                    {{ $item->segmento ?? 'N/A' }}
                                @endisset
                            </td>
                            <td>{{ $item->tela }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                            <td class="col-acoes">
                                <a href="{{ Storage::url($item->endereco) }}" target="_blank" class="botao"
                                   download="{{ $item->nome }}">
                                   Baixar RPT
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="paginacao">
            {{ $rpt->links() }}
        </div>
    @endif
</div>

<style>
    body {
        font-family: system-ui, Arial, sans-serif;
        background-color: #0f172a;
    }

    .rpt-container {
        padding: 20px;
        color: #fff;
    }

    .titulo {
        font-size: 24px;
        font-weight: bold;
        color: white;
        margin-bottom: 16px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 8px;
    }

    .alerta {
        background-color: rgba(239, 68, 68, 0.6);
        padding: 12px;
        border-radius: 8px;
    }

    .tabela-wrapper {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .tabela-rpt {
        width: 100%;
        border-collapse: collapse;
        background-color: rgba(255, 255, 255, 0.9);
        color: #111;
    }

    .tabela-rpt thead {
        background-color: #3b82f6;
        color: white;
    }

    .tabela-rpt th,
    .tabela-rpt td {
        padding: 12px 16px;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    /* ✅ Títulos centralizados */
    .tabela-rpt th {
        text-align: center;
        font-weight: 600;
    }

    /* ✅ Conteúdo das células também centralizado */
    .tabela-rpt td {
        text-align: center;
    }

    /* ✅ Coluna Versão - título e dados centralizados */
    .tabela-rpt th.col-versao,
    .tabela-rpt td.col-versao {
        text-align: center;
    }

    /* ✅ Coluna Data e Hora - largura fixa */
    .tabela-rpt th:nth-child(6), /* Data */
    .tabela-rpt th:nth-child(7) { /* Hora */
        width: 120px;
        min-width: 120px;
        max-width: 120px;
    }

    .tabela-rpt td:nth-child(6), /* Data */
    .tabela-rpt td:nth-child(7) { /* Hora */
        width: 120px;
        min-width: 120px;
        max-width: 120px;
    }

    /* ✅ Coluna Arquivo - título centralizado, botão centralizado e coluna mais estreita */
    .tabela-rpt th.col-acoes {
        text-align: center;
        width: 150px;
        min-width: 150px;
        max-width: 150px;
    }
    .tabela-rpt td.col-acoes {
        text-align: center;
        width: 150px;
        min-width: 150px;
        max-width: 150px;
    }

    .botao {
        background-color: #3b82f6;
        color: #fff;
        padding: 6px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.2s;
        white-space: nowrap;
        display: inline-block;
    }

    .botao:hover {
        background-color: #1e40af;
    }

    .paginacao {
        margin-top: 16px;
    }
</style>
