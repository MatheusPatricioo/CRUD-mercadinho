<?php
class Produto
{

    private $valor;
    private $nome;
    private $id;

    public function getId()
    {
        return $this->id;
    }
    public function setId($i)
    {
        $this->id = trim($i);
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = trim($n);
    }
    public function getValor() {
        return $this->valor;
    }
    public function setValor($v){
        $this->valor = trim($v);
    }
}

interface ProdutoDAO {
    public function add(Produto $u); // recebe um objeto da classe usuario;
    public function update(Produto $u); // atualiza no bd;
    public function delete(Produto $id); // deleta no bd;
    public function findALL(); // pega todo mundo;
    public function findById($id); //quero encontrar 1 cara só
    //public function findByOQ QUERO ENCONTRAR(OQ QUERO ENCONTRAR);
    // esse findALGUMA COISA, é pra encontrar um item por aquele "id";
    public function findByValor($valor);
}