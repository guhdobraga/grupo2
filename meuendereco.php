<?php
session_start();
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerendereco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo endereço
    if (isset($_POST['tipo_logradouro']) && isset($_POST['cidade']) && isset($_POST['bairro']) && isset($_POST['nome']) && isset($_POST['numero'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->criarEnd($_POST['tipo_logradouro'], $_POST['cidade'], $_POST['bairro'], $_POST['nome'], $_POST['numero'], $_SESSION['id_user']);
    }

    // Verifica se é uma submissão de formulário para atualizar um endereço
    if (isset($_POST['atualizar_tipo_logradouro']) && isset($_POST['atualizar_cidade']) && isset($_POST['atualizar_bairro']) && isset($_POST['atualizar_nome']) &&  isset($_POST['atualizar_numero']) && isset($_POST['atualizar_id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->atualizarEnd($_POST['atualizar_tipo_logradouro'], $_POST['atualizar_cidade'], $_POST['atualizar_bairro'],  $_POST['atualizar_nome'], $_POST['atualizar_numero'], $_POST['atualizar_id_endereco']);
    }

    // Verifica se é uma submissão de formulário para deletar um endereço
    if (isset($_POST['deletar_id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->deletarEnd($_POST['deletar_id_endereco']);
    }
}

$enderecoController = new enderecoController($pdo);
if (isset($_SESSION['id_user'])) {
    $enderecos = $enderecoController->listarEnderecosUsuario($_SESSION['id_user']);
}
$cidades = $enderecoController->listarCidades();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Página Inicial</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive-index.css">
    <link rel="shortcut icon" href="img/logo lunch fit.png" type="image/png">
</head>

<body>

    <!--Header --->
    <section class="main-header">
        <div class="esq">
            <div class="header-logo">
                <a href="index.php"><img src="img/logo.png"></a>
            </div>
        </div>
        <div class="meio">

            <ul class="header-text">
                <li><a href="lanches.php">Lanches</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
            </ul>

        </div>
        <div class="dir">
            <div class="user-icon">
                <a href="login.php"><img src="img/user-ico.png"></a>
            </div>
        </div>
    </section>
    <!--Header --->

    <body>
        <h1>Endereços</h1>
        <form action="meuendereco.php" method="post">
            <select name="tipo_logradouro" required>
                <option value="">SELECIONE O TIPO DO LOGRADOURO</option>
                <option value="Avenida">Avenida</option>
                <option value="Rua">Rua</option>
                <option value="Rodovia">Rodovia</option>
                <option value="Travessa">Travessa</option>
            </select>

            <input type="text" name="nome" placeholder="Nome do logradouro" required>

            <input type="text" name="numero" placeholder="Número" required>

            <input type="text" name="bairro" placeholder="Bairro" required>

            <select name="cidade" required>
                <?php foreach ($cidades as $cidade) : ?>
                    <option value="<?php echo $cidade['id_cidade']; ?>">
                        <?php echo $cidade['nome_cidade']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Adicionar Endereço</button>
        </form>

        <?php
        if (isset($_SESSION['id_user'])) {
            $enderecoController->exibirListaEnderecosUsuario($_SESSION['id_user']);
        } else {
            echo '<div><h1>Você precisa estar logado para ver seus endereços!</h1></div>';
        }
        ?>

        <h2>Atualizar Endereço</h2>
        <form method="post">
            <select name="atualizar_tipo_logradouro" required>
                <option value="">SELECIONE O TIPO DO LOGRADOURO</option>
                <option value="Avenida">Avenida</option>
                <option value="Rua">Rua</option>
                <option value="Rodovia">Rodovia</option>
                <option value="Travessa">Travessa</option>
            </select>

            <select name="atualizar_nome">
                <?php foreach ($enderecos as $endereco) : ?>
                    <option value="<?php echo $endereco['id_endereco']; ?>">
                        <?php echo $endereco['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="atualizar_numero" placeholder="Novo número" required>

            <input type="text" name="atualizar_bairro" placeholder="Novo bairro" required>

            <select name="atualizar_cidade" required>
                <?php foreach ($cidades as $cidade) : ?>
                    <option value="<?php echo $cidade['id_cidade']; ?>">
                        <?php echo $cidade['nome_cidade']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Atualizar Endereço</button>

            <input type="hidden" name="atualizar_id_endereco" value="<?= $endereco['id_endereco'] ?>">
        </form>

        <h2>Excluir Endereço</h2>
        <form method="post">
            <select name="deletar_id_endereco">
                <?php foreach ($enderecos as $endereco) : ?>
                    <option value="<?php echo $endereco['id_endereco']; ?>">
                        <?php echo $endereco['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Endereço</button>
        </form>
        <button class="butao" id="toggleButton">Modo Noturno</button>
        </section>

        <br><br><br>

        <!--Footer --->
        <section class="main-footer">
            <div class="esq esq-2">
                <div class="footer-logo">
                    <img src="img/logo.png">
                </div>
            </div>
            <div class="meio">

                <h1 class="footer-text">
                    All rights reserved by Lunch Fit©
                </h1>
                <a href="politica.php" class="btn2">Política de Privacidade</a>
            </div>

            </div>
        </section>
        <!--Footer --->


    </body>

</html>

<!--Script para dark mode-->
<script>
    document.getElementById("toggleButton").addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
        var sol = document.getElementById("sol");
        var lua = document.getElementById("lua");
        var imagem = document.getElementById("imagem");
        if (document.body.classList.contains("dark-mode")) {
            document.getElementById("toggleButton").textContent = "Modo Claro";
            sol.style.display = "none"; // Oculta o sol no modo noturno
            lua.style.display = "block"; // Mostra a lua no modo noturno
            imagem.src = "img/banner.png"
        } else {
            document.getElementById("toggleButton").textContent = "Modo Noturno";
            sol.style.display = "block"; // Mostra o sol no modo claro
            lua.style.display = "none"; // Oculta a lua no modo claro
        }
    });

    // Verifica o modo atual ao carregar a página
    if (document.body.classList.contains("dark-mode")) {
        document.getElementById("sol").style.display = "none"; // Oculta o sol no modo noturno
        document.getElementById("lua").style.display = "block"; // Mostra a lua no modo noturno
    } else {
        document.getElementById("sol").style.display = "block"; // Mostra o sol no modo claro
        document.getElementById("lua").style.display = "none"; // Oculta a lua no modo claro
    }
</script>