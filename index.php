<?php

require 'config.php';
require 'dao/produtoDaoMysql.php';

$produtoDao = new ProdutoDaoMysql($pdo);
$lista = $produtoDao->findAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Lista de Produtos do mercadinho</h1>
            <a href="adicionar.php" class="button">ADICIONAR PRODUTO</a>
        </header>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME DO PRODUTO</th>
                    <th>VALOR UNITÁRIO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $produto) : ?>
                    <tr>
                        <td><?= $produto->getId(); ?></td>
                        <td><?= $produto->getNome(); ?></td>
                        <td><?= $produto->getValor(); ?></td>
                        <td>
                            <a href="editar.php?id=<?= $produto->getId(); ?>" class="edit">Editar</a>
                            <a href="excluir.php?id=<?= $produto->getId(); ?>" class="delete" onclick="return confirm('Tem certeza da sua ação?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
