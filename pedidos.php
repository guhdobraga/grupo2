<?php
session_start();
include_once('C:\xampp\htdocs\grupo2\db\db.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
}

$lancheController = new lancheController($pdo);
$pedlancheController = new pedLancheController($pdo);



/*
$lanches = $lancheController->listarlanches();

$booksPorgenero = [];
foreach ($books as $book) {
    $genero = $book['genero'];
    if (!isset($booksPorgenero[$genero])) {
        $booksPorgenero[$genero] = [];
    }
    $booksPorgenero[$genero][] = $book;
}*/



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pedir'])) {
    $id_lanche = $_POST['id_lanche'];
    $nome_lanche = $_POST['nome_lanche'];
    $preco = $_POST['preco'];
    $nome_completo = $_SESSION['nome_completo'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $quantidade = $_POST['quantidade'];


    $pedlancheController->pedLanche($id_lanche, $nome_lanche, $preco, $nome_completo, $rua, $numero, $quantidade);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar'])) {
    $id_lanche = $_POST['id_lanche'];

    $pedlancheController->cancelarPedido($id_pedido);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos do Usuário</title>
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
            <div class="shop-icon">
                <?php $qtd_carrinho = 0;
                foreach ($_SESSION['carrinho'] as $qtd) {
                    $qtd_carrinho += $qtd['quantidade'];
                }; ?>
                <a href="carrinho.php"><?php echo $qtd_carrinho; ?>
                    <img src="img/carrinho-de-compras.png"></a>
            </div>
            <div class="user-icon">
                <a href="login.php"><?php if (isset($_SESSION['foto_perfil'])) {
                                        echo "<img src='./app/public/upload/" . $_SESSION["foto_perfil"] . "'></a>";
                                    } else {
                                        echo "<img src='img/user-ico.png'></a>";
                                    } ?>
            </div>
        </div>
    </section>
    <!--Header --->
    <section>
        <h4>Pedidos</h4><br>
        <ul>
            <?php

            if (isset($_SESSION['nome_completo']) && !empty($_SESSION['nome_completo'])) {
                $id_user = $_SESSION['id_user'];
            } else {

                header("Location: login.php");
                exit();
            }
            $lanchesPedidos = $pedlancheController->listarLanchesPedidos($id_user); ?>
            <?php foreach ($lanchesPedidos as $pedido) :
            ?>
                <li style="width: 500px; padding: 20px; background-color:#7BC858; margin-bottom:10px;">
                    <?php echo "<strong>Número do Pedido: </strong>" . $pedido['id_pedido']; ?> <br>
                    <?php echo "<strong>Data do Pedido: </strong>" . date('d-m-Y H:i:s', strtotime($pedido['data'])); ?>
                    <?php echo "<strong>Oque foi pedido: </strong>" . $pedido['itens_pedido']; ?> <br>
                    <?php echo "<strong>Preço total: </strong>" . "R$:" . $pedido['valor_pedido']; ?>
                    <?php echo "<strong>Quem pediu: </strong>" . $pedido['nome_completo']; ?>
                    <?php echo "<strong>Endereço de entrega: </strong>" . $pedido['tipo_logradouro'] .' '. $pedido['nome'].' Nº '.$pedido['numero'].' '.$pedido['bairro'].' - '.$pedido['nome_cidade']; ?>
                    <form method="post" action="lanche.php">
                        <input type="hidden" name="id_lache" value="<?php echo $pedido['id_pedido']; ?>">
                        <button type="submit" name="cancelar">Cancelar Pedido</button><br><br>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <button class="butao" id="toggleButton">Modo Noturno</button>
    </section>



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