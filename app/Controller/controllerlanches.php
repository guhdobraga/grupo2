<?php
require_once 'app/Model/modellanches.php';

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
        $Lanches = $this->lanchemodel->listarLanche();
        include 'app/views/lanches/lista.php';
    }

    public function atualizarLanche($id_Lanche, $nome_lanche, $preco, $ingredientes, $img_lanche)
    {
        $this->lanchemodel->atualizarLanche($id_Lanche, $nome_lanche, $preco, $ingredientes, $img_lanche);
    }

    public function deletarLanche($id_Lanche)
    {
        $this->lanchemodel->deletarLanche($id_Lanche);
    }
}

