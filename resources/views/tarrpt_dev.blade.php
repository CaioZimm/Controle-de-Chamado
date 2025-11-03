<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TARRPT</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS e JS compilados pelo Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-200 ">
    <header>
        <x-navbar />
    </header>

    <main class="p-6">
        <div class="max-w-7xl mx-auto bg-white/10 p-6 rounded-xl shadow-2xl backdrop-blur-sm border border-white/20">

                <form action="{{ route('tarrpt.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <!-- Versão -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Versão:</label>
                        <input type="text" name="versao" placeholder="Versão">
                    </div>

                    <!-- Segmento - AGORA COM DROPDOWN -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Segmento:</label>
                        <select name="segmento" class="form-select">
                            <option value="">Selecione um segmento</option>
                            @foreach($segmentos as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tela -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Tela:</label>
                        <input type="text" name="tela" placeholder="Tela">
                    </div>

                    <!-- Cliente -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Cliente:</label>
                        <input type="text" name="cliente" placeholder="Cliente">
                    </div>

                    <!-- Endereço URL -->
                    <div style="display: flex; flex-direction: column;">
                        <label for="file">Escolha o arquivo:</label>
                        <input type="file" name="file" id="file" required>
                    </div>

                     <div style="display: flex; justify-content: flex-end;">
                        <button type="submit" style="margin-top: 2%;" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 h-10">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
            <x-cards-rpt :rpt="$rpt" :segmentos="$segmentos" />
        </div>
    </main>
</html>
