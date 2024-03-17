<?php
require_once 'app/Model/modelendereco.php';

class enderecoController
{
    private $enderecomodel;

    public function __construct($pdo)
    {
        $this->enderecomodel = new enderecoModel($pdo);
    }

    public function criarEnd($cidade, $bairro, $rua, $numero)
    {
        $this->enderecomodel->criarEnd($cidade, $bairro, $rua, $numero);
    }

    public function listarEnds()
    {
        return $this->enderecomodel->listarEnd();
    }

    public function exibirListaEnds()
    {
        $Ends = $this->enderecomodel->listarEnd();
        include 'app/views/endereco/lista.php';
    }

    public function atualizarEnd($id_endereco, $cidade, $bairro, $rua, $numero)
    {
        $this->enderecomodel->atualizarEnd($id_endereco, $cidade, $bairro, $rua, $numero);
    }

    public function deletarEnd($id_endereco)
    {
        $this->enderecomodel->deletarEnd($id_endereco);
    }
}

