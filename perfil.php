<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <title>Document</title>
</head>
<body>
<header>
<!--Header --->
<section class="main-header">
    <div class="esq">
        <div class="header-logo">
            <img src="img/logo lunch fit.png">
        </div>
    </div>
    <div class="meio">
       
            <ul class="header-text">
                <li>Lanches</li>
                <li>Receitas</li>
            </ul>
       
    </div>
    <div class="dir">
        
        <div class="user-icon">
            <img src="img/icon_perfil_lunch_fit-removebg-preview.png">
        </div>
    </div>
<!--Header --->
</header>
<section>
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