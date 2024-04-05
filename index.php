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
                    <li><a href="adm.php">teste</a></li>
                </ul>
           
        </div>
        <div class="dir">
            <div class="user-icon">
            <a href="login.php"><img src="img/user-ico.png"></a>
            </div>
        </div>
</section>
<!--Header --->

<section class="main-content">
    
<!--Banner --->
    <div class="banner">
        <div class="banner-content">
<!-- Colocar a imagem aqui:--><img src="img/banner.png">
        </div>
    </div>

</section>
<!--Banner --->

<br><br>

<section class="second-content flex">
    
<!--Texto --->
    <div class="text-box">
        <div class="text-content">
            <h2>Transforme sua rotina com energia e vitalidade!</h2> 
           <p> Experimente nossos deliciosos lanches saudáveis hoje mesmo. Comece já a ter uma vida mais equilibrada e saborosa. <br><br>
            Experimente agora!</p>
        </div>
    </div>
<!--Texto --->

<!--Imagem 1 --->
    <div class="img-box">
        <div class="img-content">
            <img src="img/lanche.jfif"> 
        </div>
    </div>
<!--Imagem 1 --->

<!--Imagem 2 --->
    <div class="img-box">
        <div class="img-content">
            <img src="img/lanche2.jfif">
        </div>
    </div>
<!--Imagem 2 --->
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