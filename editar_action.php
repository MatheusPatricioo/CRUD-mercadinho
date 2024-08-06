<?php
// editar_action.php
require 'config.php';
require 'dao/ProdutoDaoMysql.php';

$produtoDao = new ProdutoDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$valor = filter_input(INPUT_POST, 'valor');

if ($id && $name && $valor) {
    $produto = new Produto();
    $produto->setId($id);
    $produto->setNome($name);
    $produto->setValor($valor);

    // Debug: Imprimir valores para verificação
    echo "id: $id, Nome: $name, Valor: $valor<br>";

    $resultado = $produtoDao->update($produto);

    if ($resultado) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar produto"; // Ou redirecionar para uma página de erro
        exit;
    }
} else {
    header("Location: editar.php?ID=" . $id);
    exit;
}
