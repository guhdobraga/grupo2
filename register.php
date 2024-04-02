<?php
require_once 'db/db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | Registro</title>
    <link rel="stylesheet" href="login.css"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-fFoSrn81UfBvgEaHKeFt4v8izycFy2s10a97+OO3oqWwRtxrXz5C4ACJoHux2+o5" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/responsive-login.css">
    <link rel="shortcut icon" href="img/logo lunch fit.png" type="image/png">
</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $nome_completo = $_POST['nome_completo'];
        $nome_usuario = $_POST['nome_usuario'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirm_password = $_POST['confirm_password'];
        $foto_perfil = $_POST['foto_perfil'];


        if (isset($_FILES["foto_perfil"]) && $_FILES["foto_perfil"]["error"] === UPLOAD_ERR_OK) {
            $foto_nome = $_FILES["foto_perfil"]["name"];
            $foto_temp = $_FILES["foto_perfil"]["tmp_name"];
            $foto_destino = "./uploads" . $foto_nome; // Diretório onde a imagem será armazenada
    
            // Mover a imagem para o diretório de uploads
            move_uploaded_file($foto_temp, $foto_destino);
        } else {
            $foto_destino = null; // Sem imagem
        }
        if ($password !== $confirm_password) {
            echo "As senhas não coincidem. Por favor, tente novamente.";
        } else {
            try {
                // Inserir a notícia no banco de dados
                $sql = "INSERT INTO users (nome_completo, nome_usuario, cpf, email, senha, foto_perfil) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome_completo, $nome_usuario, $cpf, $email, $senha, $foto_destino]);

                echo '<h1> Usuário cadastrada com sucesso! </h1>';
            } catch (PDOException $e) {
                echo "Erro ao cadastrar o usuário: " . $e->getMessage();
            }
        }
    }

    ?>


    <div class="container">
        <form class="login-form" action="register.php" method="post" enctype="multipart/form-data">
            <h2>SING-UP</h2>
            <div class="form-group">
                <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome completo" required>
            </div>
            <div class="form-group">
                <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome de usuário" required>
            </div>
            <div class="form-group">

                <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
            </div>
            <div class="form-group">

                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="form-group">

                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>

            <div class="form-group">

                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar Senha"
                    required>
            </div>

            <div class="form-group">

                <input type="file" name="foto_perfil" accept="image/*" required>

            </div>


            <br>

            <button type="submit" class="btn">CADASTRE-SE</button>
            <br><br>
            <button type="submit" class="butn"><a href="login.php">LOGIN</a></button>

        </form>
    </div>
</body>

</html>