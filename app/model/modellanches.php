<?php
class LancheModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Método para criar lanche
    public function criarLanche($nome_lanche, $preco, $ingredientes, $quantidade, $img_lanche)
    {
        $sql = "INSERT INTO lanches (nome_lanche, preco, ingredientes, quantidade, img_lanche)
    VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_lanche, $preco, $ingredientes, $quantidade, $img_lanche]);
    }

    //Model para listar lanches
    public function listarLanche()
    {
        $sql = "SELECT * FROM lanches";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }



    //Model para listar Receitas
    public function listarReceita()
    {
        $sql = "SELECT * FROM lanches";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }



    //Model para listar Catálogo
    public function listarCatalogo()
    {
        $sql = "SELECT * FROM lanches";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }


    

   //Model para atualizar lanches
public function atualizarLanche($id_lanche, $nome_lanche, $preco, $ingredientes, $quantidade, $img_lanche)
{
    $sql = "UPDATE lanches SET nome_lanche = ?, preco = ?, ingredientes = ?, quantidade = ?, img_lanche = ? WHERE id_lanche = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_lanche, $preco, $ingredientes, $quantidade, $img_lanche, $id_lanche]);
}


    // Método para deletar lanche
    public function deletarLanche($id_lanche)
    {
        $sql = "DELETE FROM lanches WHERE id_lanche = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_lanche]);
    }
}
