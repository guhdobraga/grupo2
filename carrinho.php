<?php
include_once ('C:\xampp\htdocs\grupo2\db\db.php');
include_once ('C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php');
include_once ('C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php');
include_once('C:\xampp\htdocs\grupo2\funcoes_carrinho.php');
  
  if (isset($_POST['exibir_lanche'])) {
    $lancheController = new LancheController($pdo);
    $lancheController->exibirListaLanches();
}

$lancheController = new LancheController($pdo);
$lanches = $lancheController->listarLanches();

$pedLancheController = new pedLancheController($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pedir'])) {
    var_dump($_SESSION);
    $id_lanche = $_POST['id_lanche'];
    $nome_lanche = $_POST['nome_lanche'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];


    $pedLancheController->pedLanche($id_lanche, $nome_lanche, $preco, $quantidade);
}




if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
   
    $id_lanche = $_POST['id_lanche'];
    $nome_lanche = $_POST['nome_lanche'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];


    $lanche_existente = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['id_lanche'] == $id_lanche) {
            $item['quantidade'] += $quantidade;
            $lanche_existente = true;
            break;
        }
    }

    if (!$lanche_existente) {
        $_SESSION['carrinho'][] = array(
            'id_lanche' => $id_lanche,
            'nome_lanche' => $nome_lanche,
            'preco' => $preco,
            'quantidade' => $quantidade
        );
    }

    echo '<script>alert("Lanche adicionado ao carrinho!");</script>';

header("Location: lanches.php");
exit();
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
                <a href="carrinho.php"><img src="img/carrinho-de-compras.png"></a>
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

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionar"])) {
 
    $id_lanche = $_POST["id_lanche"];
    $nome_lanche = $_POST["nome_lanche"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];


    adicionarAoCarrinho($id_lanche, $nome_lanche, $preco, $quantidade);
}

$itens_carrinho = recuperarItensDoCarrinho();



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_lanche'])) {

    $id_lanche = $_POST['id_lanche'];

  
    removerDoCarrinho($id_lanche);

    header("Location: carrinho.php");
    exit();
}


?>



<section class="main-carrinho">

<?php if (!empty($itens_carrinho)) : ?>
     <div class="item-container">
    <div class="item">
        <?php foreach ($itens_carrinho as $item) : ?>
            <div class="item-content"> <strong><?php echo $item['nome_lanche']; ?> </strong> Valor unitário: R$ <?php echo $item['preco']; ?>  (<?php echo $item['quantidade'] . ' Unidades adicionadas)';  echo "<form method='post' action='carrinho.php'>";
    echo "<input type='hidden' name='id_lanche' value='{$item['id_lanche']}'>";
    echo "<button type='submit' name='remover_lanche'>Remover</button>";
    echo "</form>";?>
        </div>
        <?php endforeach; ?>
 <?php


$total = 0;

foreach ($_SESSION['carrinho'] as $item) {

    $subtotal = $item['preco'] * $item['quantidade'];
    

    $total += $subtotal;
}

echo "Total do Carrinho: R$ " . number_format($total, 2);

?> 
    </div>
    </div>
<?php else : ?>
    <p>O carrinho está vazio.</p>
<?php endif; ?>

</section>

                    <form method="post" action="carrinho.php">
                        <input type="hidden" name="id_lanche" value="<?php echo $catalogo['id_lanche']; ?>">
                        <input type="hidden" name="nome_lanche" value="<?php echo $catalogo['nome_lanche']; ?>">
                        <input type="hidden" name="preco" value="<?php echo $catalogo['preco']; ?>">
                        <input type="hidden" name="quantidade" value="<?php echo $catalogo['quantidade']; ?>">
                        <div class="last-button">
                            <button class="finish-button" type="submit" name="pedir">FINALIZAR COMPRA</button>
                            <button class="butao" id="toggleButton">Modo Noturno</button>
                        </div>
                    </form>
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

    // Verifica o modo atual ao carregar a página
    if (document.body.classList.contains("dark-mode")) {
        document.getElementById("sol").style.display = "none";
        document.getElementById("lua").style.display = "block"; 
    } else {
        document.getElementById("sol").style.display = "block"; 
        document.getElementById("lua").style.display = "none"; 
    }



</script>