<?php
require 'config.php'; // Inclui o arquivo de configuração
require 'dao/produtoDaoMysql.php';

$produtoDao = new produtoDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

try {
    $sql = "INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor', $valor);
    $stmt->execute();

    // Redirecionar para uma página de sucesso ou exibir uma mensagem
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    // Redirecionar para uma página de erro ou exibir uma mensagem
    header("Location: erro.php?mensagem=" . urlencode($e->getMessage()));
    exit;
}
