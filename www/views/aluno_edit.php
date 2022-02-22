<?php

$ID_ALUNO = $_GET["id_aluno"];

@$erro = $_GET["erro"];
if ($erro) echo "<script> window.alert('$erro')</script>";

$query = "SELECT * from alunos WHERE ID_ALUNO = $ID_ALUNO";
$consulta_aluno = mysqli_query($conexao, $query);
// header('location:'.$_SERVER['HTTP_REFERER']);
?>

<?php while ($linha = mysqli_fetch_array($consulta_aluno)) { ?>

  <h1>
    Edição do Aluno: <?= $linha["ID_ALUNO"]; ?>
  </h1>

  <form method="post" action="services/alter/aluno.php" class="mb-4 pb-4 bg-muted p-4">
    <input type="text" value="<?= $linha["ID_ALUNO"]; ?>" name="id_aluno" class='d-none'>
    <fieldset>
      <legend>Informações Básicas</legend>
      <div class="row">
        <div class="form-group col-8">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do Aluno" value="<?= $linha['NOME_ALUNO'] ?>">
        </div>
        <div class="form-group col-4">
          <label for="cpf">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="CPF" maxlength="11" value="<?= $linha['CPF'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-4">
          <label for="rg">RG</label>
          <input type="text" class="form-control" id="rg" name="rg" required placeholder="RG" maxlength="9" value="<?= $linha['RG'] ?>">
        </div>
        <div class="form-group col-4">
          <label for="data_nasc">Data Nascimento</label>
          <input type="date" class="form-control datepicker" id="data_nasc" name="data_nasc" value="<?= $linha['DATA_NASCIMENTO'] ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="Telefone" value="<?= $linha['TELEFONE'] ?>">
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Endereço</legend>
      <div class="row">
        <div class="form-group col-8">
          <label for="rua">Rua</label>
          <input type="text" class="form-control" id="rua" name="rua" value="<?= $linha['RUA'] ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="numeroc">Nº</label>
          <input type="text" class="form-control" id="numero" name="numero" value="<?= $linha['NUMERO'] ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-4">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $linha['BAIRRO'] ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $linha['CIDADE'] ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="uf">UF</label>
          <input type="text" class="form-control" id="numero" name="uf" value="<?= $linha['UF'] ?>" required>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Matrícula</legend>
      <div class="row">
        <div class="form-group col-4">
          <label for="turma">Turma Atual</label>
          <input type="text" disabled class="form-control" value="<?= $linha['ID_TURMA'] ?>">
        </div>
        <div class="form-group col-6">
          <label for="turma">Nova Turma - Para Manter(Selecione a Turma Atual)</label>
          <select id="turma" class="form-control" name="turma" required>
            <?php
            echo "<option value=''> </option>";
            while ($linha = mysqli_fetch_array($consulta_turmas)) {
              echo "<option value='" . $linha['ID_TURMA'] . "'>" . $linha['ID_TURMA'] . " - " . $linha['NOME_CURSO'] . "</option>";
            } ?>
          </select>
        </div>
      </div>
    </fieldset>

    <div class="row mt-4">
      <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Salvar Modificações</button>
      </div>
    </div>

    </div>
  </form>

<?php } ?>