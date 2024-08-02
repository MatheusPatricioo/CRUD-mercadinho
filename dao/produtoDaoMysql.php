<?php

require_once 'models/Protudo';
class ProdutoDaoMysql implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $u){
        $sql = $this->pdo->prepare("INSERT INTO Produtos (nome, valor) VALUES (:nome, :valor");
        $sql->bindValue(':nome', $u->getNome());

    } 
    public function update(Produto $u){ // atualiza no bd;
    }
    public function delete(Produto $id){ // deleta no bd;
    }
    public function findALL(){ // pega todo mundo;
    }
    public function findById($id) {

    }

} 