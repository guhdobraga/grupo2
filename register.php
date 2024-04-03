<?php
require_once 'db/db.php';
require_once 'app/Controller/controlerusuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo usuário
    if (isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_FILES['imagem'])) {
        $foto_perfil = "./app/public/upload/" . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], $foto_perfil);

        $userController = new userController($pdo);
        $userController->criarUser($_POST['nome_completo'], $_POST['nome_usuario'], $_POST['cpf'], $_POST['email'], $_POST['senha'], 0, $foto_perfil);
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Registro</title>
    <link rel="stylesheet" href="login.css"  href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-fFoSrn81UfBvgEaHKeFt4v8izycFy2s10a97+OO3oqWwRtxrXz5C4ACJoHux2+o5" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/responsive-login.css">
    <link rel="shortcut icon" href="img/logo lunch fit.png" type="image/png">
</head>
<body>
    
    <div class="container">
        <form class="login-form" action="index.php" method="post" enctype="multipart/form-data">
        
            <h2>SING-UP</h2>
            <div class="form-group">
                <input type="text" id="nome" name="nome_completo" placeholder="Nome Completo" required>
            </div>

            <div class="form-group">
                <input type="text" id="nome" name="nome_usuario" placeholder="Nome de Usuário" required>
            </div>

            <div class="form-group">
                <input type="text" id="nome" name="cpf" placeholder="CPF" required>
            </div>

            <div class="form-group">
        
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="form-group">
        
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>

            <div class="form-group">
        
                <input type="file" name="imagem" accept="image/*">
            </div>

            

 <br>

            <button type="submit" class="btn">CADASTRE-SE</button>
<br><br>
            <button class="butn"><a href="login.php">LOGIN</a></button>
           
        </form>
    </div>
</body>
</html>