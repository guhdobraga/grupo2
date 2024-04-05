<?php
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php';

  //exibir Receitas
  if (isset($_POST['exibir_lanche'])) {
    $lancheController = new LancheController($pdo);
    $lancheController->exibirListaLanches();
}

$lancheController = new LancheController($pdo);
$lanches = $lancheController->listarLanches();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pedir'])) {
    $id_lanche = $_POST['id_lanche'];
    $nome_lanche = $_POST['nome_lanche'];
    $nome_completo = $_SESSION['nome_completo'];

    $pedLancheController->pedlancheModel($id_lanche, $nome_lanche, $nome_completo);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Lanches</title>
    <link rel="stylesheet" href="css/lanches.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive-index.css">
    <link rel="stylesheet" href="css/responsive-lanches.css">
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

<h1>Lanches</h1>
<section class="main-products">
 
    <?php
    $lancheController->exibirListaCatalogos();
    ?>


    <button class="butao" id="toggleButton">Modo Noturno</button>
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