<?php
$ID_TURMA = $_GET["id_turma"];

@$erro = $_GET["erro"];
if ($erro) echo "<script> window.alert('$erro')</script>";

$query = "SELECT * from turmas WHERE ID_TURMA = '$ID_TURMA'";
$consulta_turma = mysqli_query($conexao, $query);
?>

<?php while ($linha = mysqli_fetch_array($consulta_turma)) { ?>

  <h1>
    Editando Turma: <?= $linha["ID_TURMA"]; ?>
  </h1>

  <form method="post" action="services/alter/turma.php" class="bg-muted p-4">
    <input type="text" value="<?= $linha["ID_TURMA"]; ?>" name="id_original" class="d-none">
    <div class="row">
      <div class="form-group col-6">
        <label for="curso">Curso</label>
        <select id="curso" class="form-control" name="id_curso">
          <?php
          while ($linha_select = mysqli_fetch_array($consulta_cursos)) {
            if ($linha_select['ID_CURSO'] == $linha['ID_CURSO']) {
              echo "<option selected value='" . $linha_select['ID_CURSO'] . "'>" . $linha_select['NOME_CURSO'] . " - " . $linha_select['NOME_CURSO'] . "</option>";
            } else {
              echo "<option value='" . $linha_select['ID_CURSO'] . "'>" . $linha_select['NOME_CURSO'] . " - " . $linha_select['NOME_CURSO'] . "</option>";
            }
          } ?>
        </select>
      </div>
      <div class="form-group col-5">
        <label for="turma">CÓDIGO DA TURMA</label>
        <input type="text" maxlength="4" class="form-control" id="turma" name="id_turma" placeholder="Código da Turma" value="<?= $linha['ID_TURMA']; ?>">
      </div>
      <div class="form-group col-1 d-flex align-items-end justify-content-end">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </form>

<?php } ?>