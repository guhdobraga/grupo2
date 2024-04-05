<?php
class userModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Método para criar user
    public function criarUser($nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil)
    {
        $sql = "INSERT INTO users (nome_completo, nome_usuario, cpf, email, senha, adm, foto_perfil)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil]);
    }

    //Model para listar users
    public function listarUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    //Model para atualizar users
    public function
    atualizarUser(
        $id_user,
        $nome_completo,
        $nome_usuario,
        $cpf,
        $email,
        $senha,
        $adm,
        $foto_perfil
    ) {
        $sql = "UPDATE users SET nome_completo = ?, nome_usuario = ?, cpf = ? email = ?, senha = ?, adm = ?, foto_perfil = ?
    WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_completo, $nome_usuario, $cpf, $email, $senha, $adm, $foto_perfil, $id_user]);
    }


    // Método para deletar usuário
    public function deletarUser($id_user)
    {
        $sql = "DELETE FROM users WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user]);
    }
}
