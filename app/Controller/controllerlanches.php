<?php
require_once 'C:\xampp\htdocs\grupo2\app\Model\modellanches.php';

class lancheController
{
    private $lanchemodel;

    public function __construct($pdo)
    {
        $this->lanchemodel = new lancheModel($pdo);
    }

    public function criarLanche($nome_lanche, $preco, $ingredientes, $img_lanche)
    {
        $this->lanchemodel->criarLanche($nome_lanche, $preco, $ingredientes, $img_lanche);
    }

    public function listarLanches()
    {
        return $this->lanchemodel->listarLanche();
    }

    public function exibirListaLanches()
    {
        $lanches = $this->lanchemodel->listarLanche();
        include 'C:\xampp\htdocs\grupo2\app\views\lanches\lista.php';
    }



    // Exibir das Receitas
    public function listarReceitas()
    {
        return $this->lanchemodel->listarReceita();
    }

    public function exibirListaReceitas()
    {
        $receitas = $this->lanchemodel->listarReceita();
        include 'C:\xampp\htdocs\grupo2\app\views\receitas\lista.php';
    }

    // Final do Listar Receitas


    // Exibir do catalogo
    public function listarCatalogos()
    {
        return $this->lanchemodel->listarCatalogo();
    }

    public function exibirListaCatalogos()
    {
        $catalogos = $this->lanchemodel->listarCatalogo();
        include 'C:\xampp\htdocs\grupo2\app\views\catalogo\lista.php';
    }

    // Final do Listar catalogo



    public function atualizarLanche($id_Lanche, $nome_lanche, $preco, $ingredientes, $img_lanche)
    {
        $this->lanchemodel->atualizarLanche($id_Lanche, $nome_lanche, $preco, $ingredientes, $img_lanche);
    }



    public function deletarLanche($id_Lanche)
    {
        $this->lanchemodel->deletarLanche($id_Lanche);
    }
}

