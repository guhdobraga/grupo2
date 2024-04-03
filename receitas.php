<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Receitas</title>
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/receita.css">
    <link rel="stylesheet" href="css/responsive-index.css">
    <link rel="stylesheet" href="css/responsive-receitas.css">
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
    <br>
    <div class="texto">
        <p>Receitas</p>
    </div>

    <section class="geral">
        <div class="first">
            <div class="imagem">
                <img src="img/frango.jpg" alt="Image" height="201" width="305">
                
                    <div class="escrita">
<br>                        
        <h2>Sanduíche de frango </h2> 
        <br><br>
        <p>O sanduíche de frango é uma delícia irresistível que conquista paladares ao redor do mundo. <br> Com sua combinação de sabores e texturas, é uma opção versátil e satisfatória para 
            qualquer refeição. <br> O segredo para um sanduíche de frango perfeito está na qualidade dos ingredientes e na preparação cuidadosa.</p>
                </div>
                </a>
            </div>
        </div>
    </div>
       <button class="butao" id="toggleButton">Modo Noturno</button>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="geral2">
        <div class="first">
            <div class="imagem">
                <img src="img/peixe.jpg" alt="Image" height="201" width="305">
                
                    <div class="escrita">
<br>
        <h2>Sanduíche de salmão </h2>     
        <br><br>
        <p>O sanduíche de salmão é uma delícia que combina sabores frescos e saudáveis em cada mordida. <br>
            Começando com uma base de pão macio e leve, este sanduíche ganha vida com camadas generosas de salmão <br>
            defumado ou grelhado, oferecendo um sabor rico e uma textura suculenta. 
            <br>Acompanhe a receita.....</p>               
                    </div>
                </a>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="geral3">
        <div class="first">
            <div class="imagem">
                <img src="img/queijo-branco.jpg" alt="Image" height="201" width="305">
                
                    <div class="escrita"> 
<br>
        <h2>Sanduíche de queijo branco </h2>     
<br>        
        <p>O sanduíche de salmão é uma delícia que combina sabores frescos e saudáveis em cada mordida. <br>
            Começando com uma base de pão macio e leve, este sanduíche ganha vida com camadas generosas de salmão <br>
            defumado ou grelhado, oferecendo um sabor rico e uma textura suculenta. 
            <br>Acompanhe a receita.....</p>
         
                    </div>
                </a>
            </div>
        </div>
    </div>
    

</section>
<br>
<br>
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