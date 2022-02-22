<?php
$ID_PROFESSOR = $_GET["id_professor"];

@$erro = $_GET["erro"];
if ($erro) echo "<script> window.alert('$erro')</script>";

$query = "SELECT * from professor WHERE ID_PROFESSOR = $ID_PROFESSOR";
$consulta_professor = mysqli_query($conexao, $query);
?>

<?php while ($linha = mysqli_fetch_array($consulta_professor)) { ?>

  <h1>
    Editando Professor: <?= $linha["ID_PROFESSOR"]; ?>
  </h1>

  <form method="post" action="services/alter/professor.php" class="mb-4 pb-4 bg-muted p-4">
    <input type="text" value="<?= $linha["ID_PROFESSOR"]; ?>" name="id_professor" class="d-none">
    <fieldset>
      <legend>Informações Básicas</legend>
      <div class="row">
        <div class="form-group col-8">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do Professor" value="<?= $linha["NOME_PROFESSOR"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="cpf">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="CPF" maxlength="11" value="<?= $linha["CPF"]; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-4">
          <label for="rg">RG</label>
          <input type="text" class="form-control" id="rg" name="rg" required placeholder="RG" maxlength="9" value="<?= $linha["RG"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="data_nasc">Data Nascimento</label>
          <input type="date" class="form-control datepicker" id="data_nasc" name="data_nasc" required value="<?= $linha["DATA_NASCIMENTO"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="Telefone" value="<?= $linha["TELEFONE"]; ?>">
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Endereço</legend>
      <div class="row">
        <div class="form-group col-8">
          <label for="rua">Rua</label>
          <input type="text" class="form-control" id="rua" name="rua" required value="<?= $linha["RUA"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="numero">Nº</label>
          <input type="text" class="form-control" id="numero" name="numero" required value="<?= $linha["NUMERO"]; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-4">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" required value="<?= $linha["BAIRRO"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" required value="<?= $linha["CIDADE"]; ?>">
        </div>
        <div class="form-group col-4">
          <label for="uf">UF</label>
          <input type="text" class="form-control" id="uf" name="uf" required value="<?= $linha["UF"]; ?>">
        </div>
      </div>
    </fieldset>

    <div class="row">
      <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Atualizar</button>
      </div>
    </div>

    </div>
  </form>

<?php } ?>