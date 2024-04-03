<?php
require_once 'C:\xampp\htdocs\grupo2\grupo2\app\model\modelusuario.php';

class userController
{
    private $usermodel;

    public function __construct($pdo)
    {
        $this->usermodel = new userModel($pdo);
    }

    public function criarUser($nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil)
    {
        $this->usermodel->criarUser($nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil);
    }

    public function listarUsers()
    {
        return $this->usermodel->listarUsers();
    }

    public function exibirListausers()
    {
        $users = $this->usermodel->listarusers();
        include 'C:\xampp\htdocs\grupo2\grupo2\app\views\usuario\lista.php';
    }

    public function atualizarUser($id_user, $nome_completo, $nome_usuario, $cpf, $email, $senha, $adm)
    {
        $this->usermodel->atualizarUser($id_user, $nome_completo, $nome_usuario, $cpf, $email, $senha, $adm);
    }

    public function deletarUser($id_user)
    {
        $this->usermodel->deletarUser($id_user);
    }
}

