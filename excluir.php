<?php
require 'config.php';
require 'dao/produtoDaoMysql.php';

$produtoDao = new produtoDaoMysql($pdo);

// Obtém o ID do produto enviado pela URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Verifica se o ID foi enviado
if ($id) {
    $produtoDao->delete($id);
    header("Location: index.php");
    exit;
} else {
    // Tratar caso o ID não seja válido, por exemplo, redirecionar para uma página de erro
    header("Location: erro.php");
    exit;
}
