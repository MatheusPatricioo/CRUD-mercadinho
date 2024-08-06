<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Produto</h1>
        <form id="form-produto" method="POST" action="adicionar_action.php">
            <label for="nome">
                Nome do Produto:<br />
                <input type="text" name="nome" id="nome" required>
            </label>

            <label for="valor">
                Valor Unitário:<br />
                <input type="number" name="valor" id="valor" step="0.01" required>
            </label>

            <input type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
