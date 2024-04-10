<?php
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerendereco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo endereço
    if (isset($_POST['cidade']) && isset($_POST['bairro']) && isset($_POST['rua']) && isset($_POST['numero'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->criarEnd($_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
    }

    // Verifica se é uma submissão de formulário para atualizar um endereço
    if (isset($_POST['atualizar_cidade']) && isset($_POST['atualizar_bairro']) && isset($_POST['atualizar_rua']) && isset($_POST['atualizar_numero']) && isset($_POST['id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->atualizarEnd($_POST['id_endereco'], $_POST['atualizar_cidade'], $_POST['atualizar_bairro'], $_POST['atualizar_rua'], $_POST['atualizar_numero']);
    }

    // Verifica se é uma submissão de formulário para deletar um endereço
    if (isset($_POST['deletar_id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->deletarEnd($_POST['deletar_id_endereco']);
    }

    // Exibir endereços
    if (isset($_POST['exibir_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->exibirListaEnds();
    }

}

$enderecoController = new enderecoController($pdo);
$enderecos = $enderecoController->ListarEnds();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | ADM Lanche</title>
    <link rel="stylesheet" href="/grupo2/css/header.css">
    <link rel="stylesheet" href="/grupo2/css/index.css">
    <link rel="stylesheet" href="/grupo2/css/footer.css">
    <link rel="stylesheet" href="/grupo2/css/responsive-index.css">
    <link rel="shortcut icon" href="/grupo2/img/logo lunch fit.png" type="image/png">

</head>

<body>
    <header>
        <section class="main-header">
            <div class="esq">
                <div class="header-logo">
                    <a href="/grupo2/index.php"><img src="/grupo2/img/logo lunch fit.png"></a>
                </div>
            </div>
            <div class="meio">


                <ul class="header-text">
                    <li><a href="/grupo2/lanches.php">Lanches</a></li>
                    <li><a href="/grupo2/receitas.php">Receitas</a></li>
                    <li><a href="/grupo2/adm.php">ADM</a></li>
                </ul>

            </div>
            <div class="dir">
                <div class="user-icon">
                    <a href="/grupo2/login.php"><img src="/grupo2/img/user-ico.png"></a>
                </div>
            </div>
        </section>
    </header>

    <body>
        <h1>Endereços</h1>
        <form action="adm_endereco.php" method="post">
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="bairro" placeholder="Bairro" required>
            <input type="text" name="rua" placeholder="Rua" required>
            <input type="text" name="numero" placeholder="Número" required>
            <button type="submit">Adicionar Endereço</button>
        </form>

        <?php
        $enderecoController->exibirListaEnds();
        ?>

        <h2>Atualizar Endereço</h2>
        <form method="post">
            <select name="id_endereco">
                <?php foreach ($enderecos as $endereco): ?>
                    <option value="<?php echo $endereco['id_endereco']; ?>">
                        <?php echo $endereco['rua']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="atualizar_cidade" placeholder="Nova cidade" required>
            <input type="text" name="atualizar_bairro" placeholder="Novo bairro" required>
            <input type="text" name="atualizar_rua" placeholder="Nova rua" required>
            <input type="text" name="atualizar_numero" placeholder="Novo número" required>
            <button type="submit">Atualizar Endereço</button>
        </form>

        <h2>Excluir Endereço</h2>
        <form method="post">
            <select name="deletar_id_endereco">
                <?php foreach ($enderecos as $endereco): ?>
                    <option value="<?php echo $endereco['id_endereco']; ?>">
                        <?php echo $endereco['rua']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Endereço</button>
        </form>
        <button class="butao" id="toggleButton">Modo Noturno</button>


        <footer>

            <section class="main-footer">
                <div class="esq esq-2">
                    <div class="footer-logo">
                        <img src="/grupo2/img/logo.png">
                    </div>
                </div>

                <div class="meio">

                    <h1 class="footer-text">
                        All rights reserved by Lunch Fit©
                    </h1>

                </div>

            </section>
        </footer>

    </body>

</html>


<!--Script para dark mode-->
<script>
    document.getElementById("toggleButton").addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        var sol = document.getElementById("sol");
        var lua = document.getElementById("lua");
        if (document.body.classList.contains("dark-mode")) {
            document.getElementById("toggleButton").textContent = "Modo Claro";
            sol.style.display = "none";
            lua.style.display = "block";
        } else {
            document.getElementById("toggleButton").textContent = "Modo Noturno";
            sol.style.display = "block";
            lua.style.display = "none";
        }
    });


    if (document.body.classList.contains("dark-mode")) {
        document.getElementById("sol").style.display = "none";
        document.getElementById("lua").style.display = "block";
    } else {
        document.getElementById("sol").style.display = "block";
        document.getElementById("lua").style.display = "none";
    }
</script>