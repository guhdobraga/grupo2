<?php
require_once 'db/db.php';
require_once 'app/Controller/controllerusuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo usuário
    if (isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_FILES['foto_perfil'])) {
        $foto_perfil = "./app/public/upload/" . $_FILES['foto_perfil']['name'];
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $foto_perfil);

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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_completo = $_POST['nome_completo'];
        $nome_usuario = $_POST['nome_usuario'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirm_password = $_POST['c-senha']; 
        $foto_perfil = $_FILES['foto_perfil']['name'];

        if ($senha !== $confirm_password) { 
            echo "As senhas não coincidem. Por favor, tente novamente.";
        } else {
            try {
                $foto_destino = "./uploads/" . $foto_perfil;
                move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $foto_destino);

                // Inserir usuário no banco de dados
                $sql = "INSERT INTO users (nome_completo, nome_usuario, cpf, email, senha, foto_perfil) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome_completo, $nome_usuario, $cpf, $email, $senha, $foto_destino]);

                echo '<h1> Usuário cadastrado com sucesso! </h1>';
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
        
                <input type="password" id="c-senha" name="c-senha" placeholder="Confirmar Senha" required>
            </div>

            <div class="form-group">

                <input type="file" name="foto_perfil" accept="image/*" required>

            </div>


            <br>

            <button type="submit" class="btn">CADASTRE-SE</button>
            <br><br>
            <button type="submit" class="butn"><a href="login.php">LOGIN</a></button>
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