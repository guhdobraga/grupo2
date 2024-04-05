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
                </ul>
           
        </div>
        <div class="dir">
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

<section class="main-carrinho"> 
<div class="container">
  <div class="item-container">
    
    <div class="item">
    <div class="item-content">
      <span>Item 1</span>
      <span>R$ 10.00</span>
      </div>
    </div>
    <div class="item">
    <div class="item-content">
      <span>Item 2</span>
      <span>R$ 20.00</span>
      </div>
    </div>
    <div class="item">
    <div class="item-content">
      <span>Item 3</span>
      <span>R$ 15.00</span>
      </div>
    </div>
  </div>
</div>
</section>
<div class="last-button">
<button class="finish-button">FINALIZAR COMPRA</button>
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