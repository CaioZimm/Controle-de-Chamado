<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TarRPT</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-blue-900 bg-cover bg-center" style="background-image: url('{{ asset('images/4879.jpg') }}')" >
    <header>
        <x-navbar />
    </header>

    <main class="p-6">
        <div class="max-w-7xl mx-auto bg-white/10 p-6 rounded-xl shadow-2xl backdrop-blur-sm border border-white/20">

                <form action="{{ route('tarrpt.store') }}" method="POST">
                    @csrf
                    <!-- Versão -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Versão:</label>
                        <input type="text" name="versao" placeholder="Versão" required>
                    </div>

                      <!-- Segmento -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Segmento:</label>
                        <input type="text" name="segmento" placeholder="Segmento" required>
                    </div>

                      <!-- Tela -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Tela:</label>
                        <input type="text" name="tela" placeholder="Tela" required>
                    </div>

                      <!-- Data -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Data:</label>
                        <input type="text" name="data" placeholder="Data">
                    </div>

                      <!-- Hora -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Hora:</label>
                        <input type="text" name="hora" placeholder="Hora">
                    </div>

                      <!-- Cliente
                    <div style="display: flex; flex-direction: column;">
                        <label>Cliente:</label>
                        <input type="text" name="cliente" placeholder="Cliente">
                    </div>-->

                      <!-- Endereço URL -->
                    <div style="display: flex; flex-direction: column;">
                        <label>Endereço URL:</label>
                        <input type="text" name="endereco" placeholder="Endereço URL">
                    </div>

                     <div class="flex flex-col justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 h-10">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
            <x-cards-rpt :rpt="$rpt" />
        </div>
    </main>
</body>
</html>
