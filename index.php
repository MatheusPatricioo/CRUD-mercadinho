<?php

require 'config.php';
require 'dao/produtoDaoMysql.php';

$produtoDao = new ProdutoDaoMysql($pdo);
$lista = $produtoDao->findAll();
?>

<link rel="stylesheet" href="style.css">
<a href="adicionar.php">ADICIONAR PRODUTO</a> <table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME DO PRODUTO</th>
        <th>VALOR UNITÁRIO</th>
        <th>AÇÕES</th>
    </tr>

    <?php foreach ($lista as $produto) : ?>
        <tr>
            <td><?= $produto->getId(); ?></td>
            <td><?= $produto->getNome(); ?></td>
            <td><?= $produto->getValor(); ?></td>
            <td>
                <a href="editar.php?id=<?= $produto->getId(); ?>"> [Editar] </a>
                <a href="excluir.php?id=<?= $produto->getId(); ?>" onclick="return confirm('Tem certeza da sua ação?')"> [Excluir] </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>

