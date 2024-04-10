<?php

include_once('C:\xampp\htdocs\grupo2\db\db.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
}

$lancheController = new lancheController($pdo);
$pedlancheController = new pedLancheController($pdo);


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
            <a href="carrinho.php"><img src="img/carrinho-de-compras.png"></a>
            </div>
            <div class="user-icon">
            <a href="login.php"><img src="img/user-ico.png"></a>
            </div>
        </div>
</section>
<!--Header --->
    <section>
        <h1>Pedidos</h1><br>
        <ul>
        <?php session_start(); ?>
            <?php $lanchesPedidos = $pedlancheController->listarLanchesPedidos($_SESSION['nome_completo']); ?>
            <?php foreach ($lanchesPedidos as $pedido) : ?>
                <?php if (isset($_SESSION['nome_completo']) && !empty($_SESSION['nome_completo'])) {
    $nome_completo = $_SESSION['nome_completo'];
} else {
   
    header("Location: login.php");
    exit(); 
}
?>
                <li>
                    <?php echo "<strong>Id do lanche: </strong>" . $pedido['id_lanche']; ?> <br>
                    <?php echo "<strong>Lanche: </strong>" . $pedido['nome_lanche']; ?> <br>
                    <?php echo "<strong>Preço Unitário: </strong>" . $pedido['preco']; ?> <br>
                    <?php echo "<strong>Nome do Usuário: </strong>" . $pedido['nome_completo']; ?>
                    <form method="post" action="lanches.php">
                        <input type="hidden" name="id_lache" value="<?php echo $pedido['id_pedido']; ?>">
                   
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
        document.getElementById("toggleButton").addEventListener("click", function () {
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

    