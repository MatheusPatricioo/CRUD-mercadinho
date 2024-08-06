<?php
require_once 'models/Produto.php';
class ProdutoDaoMysql implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $u){
        $sql = $this->pdo->prepare("INSERT INTO Produtos (nome, valor) VALUES (:nome, :valor)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':valor', $u->getValor());
        $sql->execute();
    }
    
    public function update(Produto $produto) {
        $sql = "UPDATE produtos SET nome = :nome, valor = :valor WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
    
        // Debug: Imprimir a consulta SQL
        // echo "Consulta: " . $stmt->queryString . "<br>";
    
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':valor', $produto->getValor());
        $stmt->bindValue(':id', $produto->getId());
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao atualizar: " . print_r($stmt->errorInfo(), true);
            return false;
        }
    }
    
    
    

    public function findAll() {
        $array = [];
    
        $sql = $this->pdo->query("SELECT id, nome, valor FROM produtos"); // Seleciona apenas as colunas necessárias
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($data as $item) {
                $produto = new Produto();
                $produto->setId($item['id']);
                $produto->setNome($item['nome']);
                $produto->setValor($item['valor']);
    
                $array[] = $produto;
            }
        }
    
        return $array;
    }

    public function findById($id) {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchObject('Produto');
    }
    
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id =:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function findByValor($valor){

    }
} 

