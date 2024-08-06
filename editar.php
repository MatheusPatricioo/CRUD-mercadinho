<?php
require 'config.php';
require 'dao/ProdutoDaoMysql.php';

$produtoDao = new ProdutoDaoMysql($pdo);

$produto = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $produto = $produtoDao->findById($id);
}

if ($produto === false) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Produto</h1>
        <form method="POST" action="editar_action.php">
            <input type="hidden" name="id" value="<?= $produto->getId(); ?>" />

            <label for="name">Nome do Produto:</label>
            <input type="text" id="name" name="name" value="<?= $produto->getNome(); ?>" required />

            <label for="value">Valor Unitário:</label>
            <input type="text" id="value" name="value" value="<?= $produto->getValor(); ?>" required />

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
