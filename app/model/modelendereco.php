<?php
class EnderecoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Método para criar endereco
    public function criarEnd($cidade, $bairro, $rua, $numero)
    {
        $sql = "INSERT INTO endereco (cidade, bairro, rua, numero)
    VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cidade, $bairro, $rua, $numero]);
    }

    //Model para listar endereco
    public function listarEnd()
    {
        $sql = "SELECT * FROM endereco";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    //Model para atualizar Endereco
    public function
    atualizarEnd(
        $id_endereco,
        $cidade,
        $bairro,
        $rua,
        $numero
    ) {
        $sql = "UPDATE endereco SET cidade = ?, bairro = ?, rua = ?, numero = ?
    WHERE id_endereco = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cidade, $bairro, $rua, $numero]);
    }


    // Método para deletar endereco
    public function deletarEnd($id_endereco)
    {
        $sql = "DELETE FROM endereco WHERE id_endereco = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_endereco]);
    }
}


