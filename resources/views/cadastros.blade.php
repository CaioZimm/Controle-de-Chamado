<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastros | Target RPT</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg custom-nav">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/target_logo.png') }}" alt="Logo" class="logo me-2">
                </a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark" href="{{ route('home') }}">Cadastros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark" href="{{ route('tarrpt.index') }}">Acessar RPTs</a>
                        </li>
                        <li class="nav-item ms-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn-logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main-content">
        <div class="form-container text-center text-white">
            <h1 class="form-title mb-3">Cadastros</h1>
            <p class="mb-4">Escolha o tipo de cadastro que deseja criar:</p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button data-bs-toggle="modal" data-bs-target="#modalCliente" class="btn-home-menu">Cadastrar Cliente</button>
                <button data-bs-toggle="modal" data-bs-target="#modalDepartamento" class="btn-home-menu">Cadastrar Departamento</button>
                <button data-bs-toggle="modal" data-bs-target="#modalFuncionario" class="btn-home-menu">Cadastrar Funcionário</button>
            </div>
        </div>
    </main>

    <!-- MODAL CLIENTE -->
    <div class="modal fade" id="modalCliente" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('clientes.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome do Cliente</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CNPJ</label>
                            <input type="text" name="cnpj" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn-search">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DEPARTAMENTO -->
    <div class="modal fade" id="modalDepartamento" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Departamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('home') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome do Departamento</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn-search">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL FUNCIONÁRIO -->
    <div class="modal fade" id="modalFuncionario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Funcionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('home') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Departamento</label>
                            <select name="departamento_id" class="form-select">
                                {{-- @foreach($departamentos as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->nome }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" name="cargo" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn-search">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
