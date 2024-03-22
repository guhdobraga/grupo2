<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive-index.css">
    <link rel="stylesheet" href="css/responsive-perfil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" href="img/logo lunch fit.png" type="image/png">
    <title>Lunch Fit | Perfil</title>
</head>
<body>
<header>
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
<section class="center">
<div class="container1">
    <div class="left-column">
        <h2>Troque sua foto</h2>
        <img src="img/foto de perfil.jpg" alt="Foto do Usuário" class="profile-image">
        <input type="file" accept="image/*" id="photoInput" style="display: none;">
        <button class="change-photo-button" onclick="document.getElementById('photoInput').click()">Alterar Foto</button>
    </div>
    <div class="right-column">
        <div class="info-section">
        <h2>Altere seus dados pessoais</h2>
            <label for="nomeCompleto">Nome Completo:</label>
            <input type="text" id="nomeCompleto" name="nomeCompleto">
            <label for="nomeUsuario">Nome de Usuário:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
            <button class="update-button" onclick="atualizarDadosPessoais()">Atualizar Dados Pessoais</button>
        </div>
        <div class="delivery-info">
            <h2>Altere seus dados de entrega</h2>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro">
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero">
            <button class="update-button" onclick="atualizarDadosEntrega()">Atualizar Dados de Entrega</button>
        </div>
    </div>
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
           
        </div>
       
        </div>
</section>
<!--Footer --->

<script>
     function updateImage(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function atualizarDadosPessoais() {
        // Lógica para atualizar os dados pessoais aqui
        alert("Dados pessoais atualizados!");
    }

    function atualizarDadosEntrega() {
        // Lógica para atualizar os dados de entrega aqui
        alert("Dados de entrega atualizados!");
    }
</script>

</section>
</body>
</html>