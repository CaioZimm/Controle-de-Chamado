<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if ($time == "D") Desenvolvedor @else Suporte @endif
    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS Personalizado -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="custom-body">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <header>
        <nav class="custom-nav">
            <div class="nav-container">
                <div class="nav-content">
                    <div class="logo-container">
                        <img src="{{ asset('images/target_logo.png') }}" alt="Logo" class="logo">
                    </div>

                    <div class="nav-buttons">
                        @if ($time == 'D')
                        <button data-bs-toggle="modal" data-bs-target="#modalDev" class="btn-rpt">
                            Enviar Arquivos RPTs
                        </button>
                        @endif
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
        <div class="form-container">
            <h1 class="form-title">Painel de Consulta RPT</h1>

            <form method="GET" action="{{ route('tarrpt.index') }}" class="search-form">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Versão:</label>
                        <input type="text" name="versao" placeholder="Digite a Versão" class="form-input"
                               value="{{ request('versao') }}">
                    </div>

                    <div class="form-group-full">
                        <label class="form-label">Segmento:</label>
                        <select name="segmento" class="form-select">
                            <option value="">Selecione um segmento</option>
                            <option value="1">1 - Atacado</option>
                            <option value="2">2 - Automotivo Revenda</option>
                            <option value="3">3 - Automotivo Assistência</option>
                            <option value="4">4 - Casa e Decoração</option>
                            <option value="5">5 - Conveniência</option>
                            <option value="6">6 - EPI e SIGN</option>
                            <option value="7">7 - Indústria</option>
                            <option value="8">8 - Joalheria</option>
                            <option value="9">9 - Lanchonetes, Pizzaria e Afins</option>
                            <option value="10">10 - Material de Construção</option>
                            <option value="11">11 - Mercado de Proximidade</option>
                            <option value="12">12 - Moda</option>
                            <option value="13">13 - Móveis e Eletro</option>
                            <option value="14">14 - Ótica</option>
                            <option value="15">15 - Perfumaria e Cosméticos</option>
                            <option value="16">16 - Presentes, Papelaria e Outros</option>
                            <option value="17">17 - Suplementos e Produtos Naturais</option>
                            <option value="18">18 - Loja de Instrumentos Musicais e Acessórios</option>
                            <option value="19">19 - Distribuidora de Bebidas</option>
                            <option value="20">20 - Salões de Beleza e Barbearias</option>
                            <option value="21">21 - Feiras e Exposições</option>
                            <option value="22">22 - Franquedoras</option>
                            <option value="23">23 - Retíficas e Manutenção Agrícola</option>
                            <option value="24">24 - Contratos</option>
                            <option value="25">25 - Parafusos</option>
                            <option value="26">26 - E-Commerce</option>
                            <option value="27">27 - Locação</option>
                            <option value="28">28 - Loja de Celulares</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tela:</label>
                        <input type="text" name="tela" placeholder="Digite a Tela" class="form-input"
                               value="{{ request('tela') }}">
                    </div>
                    </div>
                    <div class="form-group">
                            <label class="form-label">Cliente:</label>
                            <input type="text" name="id_cliente" placeholder="Digite o Cliente" class="form-input"
                                value="{{ request('cliente') }}">
                        </div>

                    <div class="form-actions">
                    <button type="submit" class="btn-search">
                        Buscar
                    </button>
                </div>
            </form>

            <x-cards-rpt :rpt="$rpt" />
        </div>
    </main>

    @include('modal.modal_dev')
</body>
</html>

<style>
    /* Reset e configurações básicas */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body principal */
    .custom-body {
        font-family: 'Figtree', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: #1e3a8a;
        background-image: url('../images/4879.jpg');
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
    .btn-rpt {
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

    .btn-search {
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
        transition: all 0.2s;
        cursor: pointer;
        height: 2.5rem;
    }

    /* Conteúdo principal */
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

    /* Formulário */
    .search-form {
        width: 100%;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group-full {
        display: flex;
        flex-direction: column;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: white;
        margin-bottom: 0.5rem;
    }

    .form-input, .form-select {
        border-radius: 8px;
        padding: 0.75rem;
        font-size: 0.875rem;
        border: 1px solid #d1d5db;
        outline: none;
        transition: all 0.2s;
        background: white;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        height: 3rem;
    }

    /* Estados de interação */
    input:focus, select:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        border-color: #3b82f6 !important;
    }

    button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    form[action="{{ route('logout') }}"] button:hover {
        background: linear-gradient(135deg, #b91c1c, #991b1b) !important;
    }

    button[data-bs-target="#modalDev"]:hover {
        background: linear-gradient(135deg, #5AA9E6, #3B82F6) !important;
    }

    button[type="submit"]:hover {
        background: linear-gradient(135deg, #1e40af, #1d4ed8) !important;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .main-content {
            padding: 1rem;
        }

        .form-container {
            width: 95%;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .nav-content {
            flex-direction: column;
            height: auto !important;
            padding: 1rem 0;
            gap: 1rem;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 1rem;
        }

        .nav-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn-rpt, .btn-logout {
            width: 100%;
            text-align: center;
        }
    }

</style>
