<h1>Adicionar Produto</h1>

<form id="form-produto" method="POST" action="adicionar_action.php">
  <label for="nome">
    Nome:<br />
    <input type="text" name="nome" id="nome" required>
  </label><br /><br />

  <label for="valor">
    Valor:<br />
    <input type="number" name="valor" id="valor" step="0.01" required>
  </label><br /><br />

  <input type="submit" value="Adicionar">
</form>
