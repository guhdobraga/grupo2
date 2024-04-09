<!DOCTYPE html>
<html>

<head>
    <title>Lista de lanches</title>
    <link rel="stylesheet" href="css/lanches.css">

</head>

<body>
    <section class="">

<?php  
    foreach ($catalogos as $catalogo) : ?>
            <div>
                <div class="products">
                    <?php if (!empty($catalogo['img_lanche'])) : ?>
                        <img src="<?= "../../grupo2/app/public/foto_lanches/".$catalogo['img_lanche']; ?>" alt="imagem lanche" width="100px">
                    <?php else : ?>
                        Sem Imagem
                    <?php endif; ?>
                    <?php echo $catalogo['nome_lanche']; ?><br>
                    <strong> R$<?php echo $catalogo['preco']; ?></strong>
                  
                    <form method="post">
                        <input type="hidden" name="id_lanche" value="<?php echo $catalogo['id_lanche']; ?>">
                        <input type="hidden" name="nome_lanche" value="<?php echo $catalogo['nome_lanche']; ?>">
                        <button class="btn"><?php echo "<a id='adicionar' href='?adicionar=" . $catalogo['id_lanche'] . "&nome_lanche=" . $catalogo['nome_lanche'] . "&preco=" . $catalogo['preco'] . "'>Adicionar ao carrinho</a>";?></button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>