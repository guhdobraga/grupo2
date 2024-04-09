<?php
session_start();
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerendereco.php';

$pedidosController = new pedLancheController($pdo);
$enderecoController = new enderecoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {

    $pedidosController->pedLanche($_SESSION['id_user'], $_SESSION['carrinho'], $_POST['id_endereco']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Carrinho</title>
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive-index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
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
            <div class="shop-icon">
            <?php $qtd_carrinho = 0;
                foreach ($_SESSION['carrinho'] as $qtd) {
                    $qtd_carrinho += $qtd['quantidade'];
                }; ?>
                <a href="carrinho.php"><?php echo $qtd_carrinho; ?><img src="img/carrinho-de-compras.png"></a>
            </div>
            <div class="user-icon">
                <a href="login.php"><img src="img/user-ico.png"></a>
            </div>
        </div>
    </section>
    <!--Header --->
    </header>

    <div class="car">
        <h1>Carrinho</h1>
    </div>
    <?php if (count($_SESSION['carrinho']) !== 0) { ?>

        <section class="main-carrinho">
            <form method="POST">
                <div class="container">
                    <?php foreach ($_SESSION['carrinho'] as $item) { ?>
                        <div class="item-container">

                            <div class="item">
                                <div class="item-content">
                                    <span><?= $item['quantidade'] ?> X </span>
                                    <span><?= $item['nome_lanche'] ?></span>
                                    <span>R$ <?= number_format($item['preco'] * $item['quantidade'], 2) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php }

                    if (isset($_SESSION['id_user'])) {
                        $resultadosEnderecos = $enderecoController->listarEnderecosUsuario($_SESSION['id_user']);

                        if (count($resultadosEnderecos) !== 0) { ?>
                            <h1>Selecione o endereço de entrega abaixo!</h1>
                            <select name="id_endereco" required>
                                <?php foreach ($resultadosEnderecos as $endereco) : ?>
                                    <option value="<?php echo $endereco['id_endereco']; ?>">
                                        <?php echo $endereco['tipo_logradouro'] . ' ' . $endereco['nome'] . ' Nº ' . $endereco['numero'] . ' - ' . $endereco['nome_cidade']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    <?php } else {
                            echo '<div><h1>Você não possui endereços cadastrados!</h1></div>';
                        }
                    } else {
                        echo '<div><h1>Você precisa estar logado para ver seus endereços!</h1></div>';
                    }
                    ?>
                </div>

                <button type="submit" name="finalizar" class="finish-button">FINALIZAR COMPRA</button>
            </form>
        </section>
    <?php } else { ?>
        <div class="item-container">
            <div class="item">
                <div class="item-content">
                    <span style="width: 100%; text-align:center; padding:0.5em;">Nenhum item adicionado ao carrinho</span>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="last-button">
        <button class="butao" id="toggleButton">Modo Noturno</button>
    </div>
    </section>
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
            <a href="politica.php" class="btn">Política de Privacidade</a>
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
        if (document.body.classList.contains("dark-mode")) {
            document.getElementById("toggleButton").textContent = "Modo Claro";
            sol.style.display = "none"; // Oculta o sol no modo noturno
            lua.style.display = "block"; // Mostra a lua no modo noturno
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