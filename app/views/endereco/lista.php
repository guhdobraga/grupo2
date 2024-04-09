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
                        <th>Id do endereço</th>				
                        <th>Tipo Logradouro</th>
                        <th>Nome</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                       
                    </tr>
                </thead>
                <?php foreach ($Ends as $End): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $End['id_endereco']; ?></td>
                            <td><?php echo $End['tipo_logradouro']; ?></td>
                            <td><?php echo $End['nome']; ?></td>
                            <td><?php echo $End['numero']; ?></td>
                            <td><?php echo $End['bairro']; ?></td>
                            <td><?php echo $End['nome_cidade']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>