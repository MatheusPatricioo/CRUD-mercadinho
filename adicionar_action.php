
<?php
require 'config.php';
require 'dao/produtoDaoMysql.php';

$produtoDao = new produtoDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

try {
    // Verificar se o produto já existe
    $sql = "SELECT * FROM produtos WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    if ($stmt->fetch()) {
        header("Location: adicionar.php?erro=produto_existente");
        exit;
    }

    // Inserir o produto
    //stmt é uma uma instância da classe PDOStatement. usamos pra aumentar a segurança;
    $sql = "INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor', $valor);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: index.php");
        exit;
    } else {
        header("Location: erro.php?mensagem=Erro ao inserir o produto");
        exit;
    }
} catch (PDOException $e) {
    // Tratar exceções específicas do banco de dados
    if ($e->getCode() === '23000') { // Violação de UNIQUE constraint
        header("Location: adicionar.php?erro=produto_existente");
    } else {
        header("Location: erro.php?mensagem=" . urlencode($e->getMessage()));
    }
    exit;
}


