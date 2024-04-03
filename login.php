<?php
session_start();

// Verifique se o usuário já está logado e redirecione-o para a página apropriada
if (isset($_SESSION['id_user'])) {
    header("Location: logout.php"); // Redirecione para a página de dashboard ou outra página após o login
    exit();
}

include_once('db/db.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
}
?>
<?php
require_once 'db/db.php';
require_once 'app/controller/controllerusuarios.php';
?>

<?php

include_once('db/db.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = $pdo->prepare("SELECT * FROM users WHERE email = ? AND senha = ?");
    $sql_code->execute([$email, $senha]);

    $quantidade = $sql_code->rowcount();

    if ($quantidade > 0) {
        $pdo = $sql_code->fetch(PDO::FETCH_ASSOC);


        $_SESSION['id_user'] = $pdo['id_user'];
        $_SESSION['nome_completo'] = $pdo['nome_completo'];
        $_SESSION['adm'] = $pdo['adm'];
        var_dump($_SESSION['adm']);
        $alvl = $pdo['adm'];


        switch ($adm) {
            case 0:
                header("Location: index.php");
                break;
            case 1:
                header("Location: adm.php");
                break;
            default:
                echo "USUÁRIO SEM PERMISSÃO, FAVOR CONTATAR O ADMIN!!";
                break;
        }
    } else { echo'
  <script>
    function verificarCondicao() {
      // Simulação de uma condição qualquer
      var condicao = true;

      if (condicao) {
        exibirCaixaDialogo();
      }
    }

    // Função para exibir a caixa de diálogo
    function exibirCaixaDialogo() {
      var resposta = confirm("Algumas de sua credenciais estão incorretas, tente novamente!");
      if (resposta == true) {
     
      } else {
  
      }
    }
    window.onload = verificarCondicao;
  </script>
';

    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Login</title>
    <link rel="stylesheet" href="css/login.css"  href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-fFoSrn81UfBvgEaHKeFt4v8izycFy2s10a97+OO3oqWwRtxrXz5C4ACJoHux2+o5" crossorigin="anonymous">
    <link rel="stylesheet" href="css/responsive-login.css">
    
    <link rel="stylesheet" href="css/responsive-index.css">

    <link rel="shortcut icon" href="img/logo lunch fit.png" type="image/png">
</head>
<body>
    <div class="container">
        <form action="index.php" class="login-form">
            <h2>LOGIN</h2>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
        
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>

            <div class="social-buttons">
    <button href="https://facebook.com" class="btn-social fa"><div class="social-icon"><img src="img/facebook.png"></div></button>
    <button href="https://twitter.com" class="btn-social tw"><div class="social-icon"><img src="img/twitter.png"></div></button>
    <button href="https://google.com" class="btn-social go"><div class="social-icon"><img src="img/google.png"></div></button>
</div>
 <br>

            <button type="submit" class="btn">ENTRAR</button>
<br><br>
            <button href="cadastro.html" type="submit" class="butn"><a href="register.php">CADASTRE-SE</a></button>
            <button class="butao" id="toggleButton">Modo Noturno</button>
        </form>
    </div>
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
