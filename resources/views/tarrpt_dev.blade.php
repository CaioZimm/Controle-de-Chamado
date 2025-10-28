<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TarRPT') }}</title>

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

    <main>
        <form class="width: 100px; background-color: rgb(96 139 168 / 0.2); border: 2px solid rgb(96 139 168); border-radius: 5px;">
            <div>    
                <!--Versão-->
                <div style="display: flex; flex-direction: column;" >
                    <label>Versão:</label>
                    <input></input>
                </div>

                <!--Cliente-->
                <div style="display: flex; flex-direction: column;">
                    <label>Cliente:</label>
                    <input></input>
                </div>

                <!--Tela-->
                <div style="display: flex; flex-direction: column;">
                    <label>Tela:</label>
                    <input></input>
                </div>

                <!--Segmento-->
                <div style="display: flex; flex-direction: column;">
                    <label>Segmento:</label>
                    <input></input>
                </div>

                <!--Endereço URL-->
                <div style="display: flex; flex-direction: column;">
                    <label>Endereço URL:</label>
                    <input></input>
                </div>

                <button style="background: green;">Enviar Arquivo</button>
            </div>
        </form>
    </main>
</body>
</html>
