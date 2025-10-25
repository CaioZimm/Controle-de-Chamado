<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        

    </head>
    <body>
    <h1 class="text-2xl font-bold mb-6 text-center">Sistema de Armazenamento de RPT da Target</h1>
        <button href="./login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Login
        </button>
    </body>
</html>
