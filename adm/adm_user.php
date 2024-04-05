<?php
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerusuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo usuário
    if (isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_FILES['foto_perfil'])) {
        $foto_perfil = $_FILES['foto_perfil']['name'];
$caminho = "/app/public/upload/";
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminho . $foto_perfil);

        $userController = new userController($pdo);
        $userController->criarUser($_POST['nome_completo'], $_POST['nome_usuario'], $_POST['cpf'], $_POST['email'], $_POST['senha'], 0, $foto_perfil);
    }

    // Verifica se é uma submissão de formulário para atualizar um usuário
    if (isset($_POST['atualizar_nome_completo']) && isset($_POST['atualizar_nome_usuario']) && isset($_POST['atualizar_cpf']) && isset($_POST['atualizar_email']) && isset($_POST['atualizar_senha']) && isset($_POST['atualizar_adm']) && isset($_POST['id_user'])) {
        $userController = new userController($pdo);
        $userController->atualizarUser(
            $_POST['id_user'],
            $_POST['atualizar_nome_completo'],
            $_POST['atualizar_nome_usuario'],
            $_POST['atualizar_cpf'],
            $_POST['atualizar_email'],
            $_POST['atualizar_senha'],
            $_POST['atualizar_adm'],
            $_POST['atualizar_foto_perfil']
        ); // O último argumento é vazio porque não estamos atualizando a foto do perfil aqui
    }

    // Verifica se é uma submissão de formulário para deletar um usuário
    if (isset($_POST['deletar_id_user'])) {
        $userController = new userController($pdo);
        $userController->deletarUser($_POST['deletar_id_user']);
    }
    //exibir user

    if (isset($_POST['exibir_user'])) {
        $userController->exibirListausers();
    }

    $users = $userController->listarusers();
}

$userController = new userController($pdo);
$users = $userController->listarUsers();
?>

<!DOCTYPE html>
<html>

<body>
    <h1>Usuários</h1>
    <form method="post" enctype="multipart/form-data">
        <select name="id_user">
            <input type="text" name="nome_completo" placeholder="Nome completo" required>
            <input type="text" name="nome_usuario" placeholder="Nome de usuário" required>
            <input type="text" name="cpf" placeholder="CPF" required>
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="text" name="adm" placeholder="Adm" required>
            <input type="file" name="foto_perfil" accept="image/*">
            <button type="submit">Adicionar Usuário</button>
    </form>


    <?php
    $userController->exibirListausers();
    ?>

    <h2>Atualizar Usuário</h2>
    <form method="post">
        <select name="id_user">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['id_user']; ?>"><?php echo $user['nome_completo']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="atualizar_nome_completo" placeholder="Novo nome completo" required>
        <input type="text" name="atualizar_nome_usuario" placeholder="Novo nome de usuário" required>
        <input type="text" name="atualizar_cpf" placeholder="CPF" required>
        <input type="text" name="atualizar_email" placeholder="E-mail" required>
        <input type="password" name="atualizar_senha" placeholder="Senha" required>
        <input type="text" name="adm" placeholder="Adm" required>
        <input type="file" name="atualizar_foto_perfil" accept="image/*">

        <button type="submit">Atualizar Usuário</button>
    </form>

    <h2>Excluir Usuário</h2>
    <form method="post">
        <select name="deletar_id_user">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['id_user']; ?>"><?php echo $user['nome_completo']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Usuário</button>
    </form>
</body>

</html>