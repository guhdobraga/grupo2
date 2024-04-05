<!DOCTYPE html>
<html>
<head>
    <title>Lista de Endereços</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Endereços</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>id_user</th>											
                        <th>nome_completo</th>
                        <th>nome_usuario</th>
                        <th>cpf</th>
                        <th>email</th>
                        <th>senha</th>
                        <th>adm</th>
                        <th>foto_perfil	</th>
                       
                    </tr>
                </thead>
                <?php foreach ($users as $user): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $user['id_user']; ?></td>
                            <td><?php echo $user['nome_completo']; ?></td>
                            <td><?php echo $user['nome_usuario']; ?></td>
                            <td><?php echo $user['cpf']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['senha']; ?></td>
                            <td><?php echo $user['adm']; ?></td>
                            <td><?php echo $user['foto_perfil']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>