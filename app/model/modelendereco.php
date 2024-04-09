<?php
class EnderecoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Método para criar endereco
    public function criarEnd($tipo_logradouro, $cidade, $bairro, $nome, $numero, $id_user)
    {
        $sql = "INSERT INTO endereco (tipo_logradouro, id_cidade, bairro, nome, numero, id_user)
    VALUES (?, ?, ?, ?, ?, ?) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tipo_logradouro, $cidade, $bairro, $nome, $numero, $id_user]);
    }

    //Model para listar endereco
    public function listarEnd()
    {
        $sql = "SELECT * FROM endereco";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    //Model para listar enderecos do usuario
    public function listarEnderecosUsuario($id_user)
    {
        $sql = "SELECT e.*, c.nome_cidade, u.id_user 
        FROM endereco e 
        INNER JOIN cidade c ON e.id_cidade = c.id_cidade 
        INNER JOIN users u ON e.id_user = u.id_user
        WHERE e.id_user = $id_user";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    //Model para atualizar Endereco
    public function
    atualizarEnd(
        $tipo_logradouro,
        $cidade,
        $bairro,
        $nome,
        $numero,
        $id_endereco
    ) {
        $sql = "UPDATE endereco SET tipo_logradouro = ?, id_cidade = ?, bairro = ?, nome = ?, numero = ?
    WHERE id_endereco = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tipo_logradouro, $cidade, $bairro, $nome, $numero, $id_endereco]);
    }


    // Método para deletar endereco
    public function deletarEnd($id_endereco)
    {
        $sql = "DELETE FROM endereco WHERE id_endereco = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_endereco]);
    }

    //Model para listar Cidades
    public function listarCidades()
    {
        $sql = "SELECT * FROM cidade";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

}


