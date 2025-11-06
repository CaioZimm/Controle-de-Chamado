<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .custom-body {
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #1e3a8a;
            background-image: url('{{ asset('images/4879.jpg') }}'); /* Ajustei o path da imagem */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* Navegação */
        .custom-nav {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            width: 100%;
            background-color: rgba(219, 234, 254, 0.95);
            backdrop-filter: blur(8px);
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .logo {
            height: 50px;
            width: auto;
            filter: drop-shadow(0 1px 2px rgba(0,0,0,0.1));
        }
        .nav-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            gap: 15px;
        }
        /* Botões */
        .btn-rpt, .btn-search {
            background: linear-gradient(135deg, #89CFF0, #5AA9E6);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
            text-decoration: none; /* Para links */
        }
        .btn-logout {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
            cursor: pointer;
            font-size: 14px;
        }
        /* ... (O resto do seu CSS continua aqui) ... */
        
        /* Adicionei este estilo para o botão da Home */
        .btn-home-menu {
            background: linear-gradient(135deg, #1e3a8a, #1e40af);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem 2.5rem; /* Botão maior */
            font-size: 1.25rem; /* Fonte maior */
            border-radius: 8px;
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block; /* Para o link se comportar como botão */
        }
        
        .main-content {
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: calc(100vh - 70px);
        }
        .form-container {
            width: 65%;
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .form-title {
            font-weight: 600;
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
    </style>
</head>

<body class="custom-body">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <header>
        <nav class="custom-nav">
            <div class="nav-container">
                <div class="nav-content">
                    <a class="logo-container" href="{{ url('/') }}">
                        <img src="{{ asset('images/target_logo.png') }}" alt="Logo" class="logo">
                    </a>

                    <div class="nav-buttons">

                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <div class="form-container" style="text-align: center;">
            <h1 class="form-title">
                Seja bem-vindo {{ ucfirst(Auth::user()->name) ?? '' }}!
            </h1>
            <p style="color: white; font-size: 1.1rem; margin-bottom: 2.5rem;">
                Selecione uma opção abaixo para começar.
            </p>

            <div style="gap: 2px;">
                <a href="{{ route('cadastros.index') }}" class="btn-home-menu">
                    Cadastros
                </a>

                <a href="{{ route('tarrpt.index') }}" class="btn-home-menu">
                    Acessar RPTs
                </a>
            </div>
            
        </div>
    </main>

    {{-- Modais e scripts Select2 removidos da Home --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>