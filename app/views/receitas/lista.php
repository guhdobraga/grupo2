<!DOCTYPE html>
<html>

<head>
    <title>Receitas</title>
</head>

<body>

    <div class="texto">
        <h1>Lista de Receitas</h1>
    </div>

    <?php foreach ($receitas as $receita): ?>
        <div class="lanche">
            <div class="first">
                <!DOCTYPE html>
                <div class="imagem">
                    <img src="<?= "../../grupo2/app/public/foto_lanches/".$receita['img_lanche']; ?>" height="201" width="305">
                    <div class="escrita">
                        <h2>
                            <?php echo $receita['nome_lanche']; ?>
                        </h2>
                        <p>
                            <?php echo $receita['ingredientes']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

</body>

</html>