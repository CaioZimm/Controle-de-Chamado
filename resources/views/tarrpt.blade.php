<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TarRPT - down</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-blue-900 bg-cover bg-center" style="background-image: url('{{ asset('images/4879.jpg') }}')" >
    <header>
        <x-navbar />
    </header>

    <main class="p-6">

       <div class="max-w-lg mx-auto bg-white/10 p-4 rounded-xl shadow-lg backdrop-blur-sm border border-white/20">

            <form method="GET" action="{{ route('tarrpt.index') }}">
                @csrf

                <div class="flex flex-col flex-grow min-w-[150px]">
                    <label class="font-semibold text-white mb-1">Versão:</label>
                    <input type="text" name="versao" placeholder="Digite a Versão" class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{ request('versao') }}">
                </div>
                <div class="flex flex-col flex-grow min-w-[150px]">
                    <label class="font-semibold text-white mb-1">Cliente:</label>
                    <input type="text" name="cliente" placeholder="Digite o Cliente" class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{ request('cliente') }}">
                </div>
                <div class="flex flex-col flex-grow min-w-[150px]">
                    <label class="font-semibold text-white mb-1">Tela:</label>
                    <input type="text" name="tela" placeholder="Digite a Tela" class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{ request('tela') }}">
                </div>
                <div class="flex flex-col flex-grow min-w-[150px]">
                    <label class="font-semibold text-white mb-1">Segmento:</label>
                    <input type="number" name="segmento" placeholder="Digite o Segmento" min="1" max="27" class="rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{ request('segmento') }}">
                </div>

                <div class="flex flex-col justify-end items-end h-16">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 h-10">
                        Buscar
                    </button>
                </div>

            </form>
            <x-cards-rpt :rpt="$rpt" />
        </div>
    </main>
</body>
</html>
