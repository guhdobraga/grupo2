<?php
require_once 'app/Model/modelusuario.php';

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
        include 'app/views/usuario/lista.php';
    }

    public function atualizarUser($id_user, $nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil)
    {
        $this->usermodel->atualizarUser($id_user, $nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil);
    }

    public function deletarUser($id_user)
    {
        $this->usermodel->deletarUser($id_user);
    }
}

