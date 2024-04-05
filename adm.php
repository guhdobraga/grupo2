<?php
    session_start();
    include_once 'gerar_pdf.php';
    
    if($_SESSION['adm'] != 1) {
        header('Location: index.php');
    }
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

    <header>
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
    </header>

    <main>
        <section class="main-content">
            
                        <div>
                            <button><a href="adm/adm_user.php">Administação de Usuários</a></button>
                            <button><a href="adm/adm_lanche.php">Administação de Lanches</a></button>
                            <button><a href="adm/adm_endereco.php">Administação de Endereços</a></button>
                            <a href="<?= $filename ?>" download="<?= $filename ?>">
                            <button style="color:#eb6427;" type="button">Baixar PDF</button>
                            </a>

                        </div>
                        <!--Imagem 2 --->
                        <button class="butao" id="toggleButton">Modo Noturno</button>
                        <div>

                        </div>
                    </section>

    <div class="main-content">

    </div>
    
    </main>

    <br><br><br>

    <footer>

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

        </section>
    </footer>

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