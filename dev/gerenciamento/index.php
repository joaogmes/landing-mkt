<!DOCTYPE html>

<head>
    <title>Agência Jota Gomes - Gerenciamento</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.css">
    <script type="text/javascript" src="./assets/js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php

    include_once('./modulos/cfg/conexao.php');
    include_once('./modulos/cfg/funcoes.php');

    if (!checarLogin()) {
        include('./modulos/login/login.php');
        die();
    }

    if(checarInstalacao()!='completo'){
    	$etapa = checarInstalacao();
        include('./modulos/instalacao/install.php');
        // header('Location: ./?modulo=instalacao&acao=install&etapa='.checarInstalacao());
        // echo '<script>window.location.href="./?modulo=instalacao&acao=install&etapa='.checarInstalacao().'";</script>';
    	die();
    }

    $modulo = ($modulo = isset($_GET['modulo'])) ? $_GET['modulo'] : 'dashboard';
    $acao = ($acao = isset($_GET['acao'])) ? $_GET['acao'] : 'listar';
    $chave = ($chave = isset($_GET['chave'])) ? $_GET['chave'] : '';
    $valor = ($valor = isset($_GET['valor'])) ? $_GET['valor'] : '';
    $param = ($param = isset($_GET['param'])) ? $_GET['param'] : '';
    $valor_p = ($valor_p = isset($_GET['valor_p'])) ? $_GET['valor_p'] : '';

    $status_bd_local = ('local');
    $status_bd_online = ('online');
    // $status_bd_local = verificarConexao('local');
    // $status_bd_online = verificarConexao('online');

    ?>
    <header>
        <div class="container padding-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="./?modulo=dashboard&acao=listar"><img src="./assets/logo.png" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- <li class="nav-item <?= ($modulo == 'dashboard') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=dashboard&acao=listar">Dashboard</span></a>
                        </li> -->
                        <li class="nav-item <?= ($modulo == 'clientepf') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=clientepf&acao=listar">Clientes (PF)</span></a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'clientepj') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=clientepj&acao=listar">Clientes (PJ)</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'contas') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=contas&acao=listar">Contas à Pagar</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'pagamentos') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=pagamentos&acao=listar">Contas à Receber</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'pecas') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=pecas&acao=listar">Peças</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'relatorios') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=relatorios&acao=listar">Relatórios</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" autofocus placeholder="Nº OS">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <section>
        <div class="container include">
            <?php
            include('./modulos/' . $modulo . '/' . $acao . '.php');
            ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <hr>
            <h4>Status do sistema:</h4>
            <ul class="list-inline">
                <li class="list-inline-item">Banco local: <?= $status_bd_local ?> |</li>
                <li class="list-inline-item">Banco online: <?= $status_bd_online ?> |</li>
                <li class="list-inline-item">Usuário: <?= $_SESSION['usuario'] ?> |</li>
                <li class="list-inline-item">IP: <?= $_SERVER['REMOTE_ADDR']; ?> |</li>
                <li class="list-inline-item">Data: <?= date("d/m/Y - H:i") ?> |</li>
                <li class="list-inline-item"><a href="?modulo=login&acao=logout">Sair</a></li>
            </ul>
        </div>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./?modulo=<?= $modulo ?>"><?= $modulo ?></a></li>
                    <li class="breadcrumb-item"><a href="./?modulo=<?= $modulo ?>&acao=<?= $acao ?>"><?= $acao ?></a></li>
                </ol>
            </nav>
        </div>
    </footer>
    <script type="text/javascript" src="./assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="./assets/js/jquery.mask.js"></script>
</body>