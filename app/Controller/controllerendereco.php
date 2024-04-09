<?php
require_once 'C:\xampp\htdocs\grupo2\app\Model\modelendereco.php';

class enderecoController
{
    private $enderecomodel;

    public function __construct($pdo)
    {
        $this->enderecomodel = new enderecoModel($pdo);
    }

    public function criarEnd($tipo_logradouro, $cidade, $bairro, $rua, $numero, $id_user)
    {
        $this->enderecomodel->criarEnd($tipo_logradouro, $cidade, $bairro, $rua, $numero, $id_user);
    }

    public function listarEnds()
    {
        return $this->enderecomodel->listarEnd();
    }
    
    public function listarEnderecosUsuario($id_user)
    {
        return $this->enderecomodel->listarEnderecosUsuario($id_user);
    }

    public function exibirListaEnds()
    {
        $Ends = $this->enderecomodel->listarEnd();
        include 'C:\xampp\htdocs\grupo2\app\views\endereco\lista.php';
    }
    
    public function exibirListaEnderecosUsuario($id_user)
    {
        $Ends = $this->listarEnderecosUsuario($id_user);
        include 'C:\xampp\htdocs\grupo2\app\views\endereco\lista.php';
    }

    public function atualizarEnd($tipo_logradouro, $cidade, $bairro, $nome, $numero,$id_endereco)
    {
        $this->enderecomodel->atualizarEnd($tipo_logradouro, $cidade, $bairro, $nome, $numero, $id_endereco);
    }

    public function deletarEnd($id_endereco)
    {
        $this->enderecomodel->deletarEnd($id_endereco);
    }

    /*------------------------*/
    public function listarCidades()
    {
        return $this->enderecomodel->listarCidades();
    }
}
?>
