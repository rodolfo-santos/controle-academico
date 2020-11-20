<?php
  $ID_RELACAO = $_GET["id_relacao"];
  $ID_DISCIPLINA = $_GET["id_disciplina"];
  $NOME_DISCIPLINA = $_GET["nome_disciplina"];
  $ID_TURMA = $_GET["id_turma"];
  $ID_CURSO = $_GET["id_curso"];
  $NOME_CURSO = $_GET["nome_curso"];

  $query = "SELECT * FROM TURMA_DISC_PROFE WHERE ID_TURMA_DISC_PROFE = $ID_RELACAO";
  $consulta_relacao = mysqli_query($conexao, $query);

  @$erro = $_GET["erro"];
  if($erro) echo "<script> window.alert('$erro')</script>";

  $query = "SELECT ID_PROFESSOR, NOME_PROFESSOR FROM PROFESSOR";
  $consulta_professores = mysqli_query($conexao, $query);

?>

<h1>
  Editando Relação: <?= $ID_RELACAO; ?>
</h1>
<?php while($linha = mysqli_fetch_array($consulta_relacao)) { ?>

  <form method="post" action="services/alter/relacao_prof.php" class="bg-muted p-4">
    <input type="text" name="id_relacao" class="d-none" value="<?=$ID_RELACAO?>">
    <div class="row">
      <div class="form-group col-12">
        <label for="turma">TURMA</label>
        <input type="text" maxlength="4" class="form-control" 
          id="turma" name="turma" p
          laceholder="Código da Turma" 
          readonly 
          value="<?=$ID_TURMA?>
        ">
      </div>
      <div class="form-group col-12">
        <label for="curso">CURSO</label>
        <input type="text" name="id_curso" class="d-none" value="<?=$ID_CURSO?>">
        <input type="text" maxlength="4" class="form-control" id="curso" name="nome_curso" placeholder="Curso" readonly value="<?=$NOME_CURSO?>">
      </div>
      <div class="form-group col-12">
        <label for="disciplina">DISCIPLINA</label>
        <input type="text" readonly value="<?= $NOME_DISCIPLINA ?>" class="form-control">
      </div>
      <div class="form-group col-12">
        <label for="professor">PROFESSOR</label>
        <select id="professor" class="form-control" name="id_professor">
          <?php
            while($linha2 = mysqli_fetch_array($consulta_professores)) {
            if($linha['ID_PROFESSOR'] == $linha2["ID_PROFESSOR"]) {
              echo "<option selected value='".$linha2['ID_PROFESSOR']."'>".$linha2['NOME_PROFESSOR']."</option>";
            } else {
              echo "<option value='".$linha2['ID_PROFESSOR']."'>".$linha2['NOME_PROFESSOR']."</option>";
            }
          } ?>
        </select> 
      </div>
    </div>
    <div class="row">
    <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Atualizar Relação</button>
    </div>
  </div>
</form>

<?php } ?>