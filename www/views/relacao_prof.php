<?php
$ID_TURMA = $_GET['turma'];
$NOME_CURSO = $_GET['curso'];
$ID_CURSO = $_GET['id_curso'];

$query = "SELECT 
      turma_disc_profe.ID_TURMA_DISC_PROFE,
      turma_disc_profe.ID_TURMA,
      turma_disc_profe.ID_DISCIPLINA,
      turma_disc_profe.ID_PROFESSOR,

      disciplinas.NOME_DISCIPLINA, 
      professor.NOME_PROFESSOR 

    FROM 
      turma_disc_profe, 
      disciplinas, 
      professor

    WHERE 
      turma_disc_profe.ID_DISCIPLINA = disciplinas.ID_DISCIPLINA AND
      turma_disc_profe.ID_PROFESSOR = professor.ID_PROFESSOR AND
      turma_disc_profe.ID_TURMA = '$ID_TURMA'";

$consulta_relacoes = mysqli_query($conexao, $query);


$query = "SELECT ID_PROFESSOR, NOME_PROFESSOR FROM professor";
$consulta_professores = mysqli_query($conexao, $query);


$query = "SELECT ID_DISCIPLINA, NOME_DISCIPLINA
    FROM disciplinas WHERE ID_DISCIPLINA NOT IN (
      SELECT 
        turma_disc_profe.ID_DISCIPLINA
      FROM 
        turma_disc_profe, 
        disciplinas, 
        professor

      WHERE 
        turma_disc_profe.ID_DISCIPLINA = disciplinas.ID_DISCIPLINA AND
        turma_disc_profe.ID_PROFESSOR = professor.ID_PROFESSOR AND
        turma_disc_profe.ID_TURMA = '$ID_TURMA'
  ) AND ID_CURSO = $ID_CURSO";
$consulta_disciplinas_disponiveis = mysqli_query($conexao, $query);

?>


<h1><?php echo $ID_TURMA ?> - Gerenciamento de Disciplinas</h1>

<div class="row">
  <div class="col-12 d-flex justify-content-end">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#relacionar_professor" aria-expanded="false" aria-controls="relacionar_professor">
      Relacionar Professor com Matéria
    </button>
  </div>
</div>

<div class="collapse" id="relacionar_professor">
  <form method="post" action="services/insert/relacao_prof.php" class="bg-muted p-4">
    <div class="row">
      <div class="form-group col-12">
        <label for="turma">TURMA</label>
        <input type="text" maxlength="4" class="form-control" id="turma" name="turma" placeholder="Código da Turma" readonly value="<?= $ID_TURMA ?>">
      </div>
      <div class="form-group col-12">
        <label for="curso">CURSO</label>
        <input type="text" name="curso" class="d-none" value="<?= $ID_CURSO ?>">
        <input type="text" maxlength="4" class="form-control" id="curso" placeholder="Curso" readonly value="<?= $NOME_CURSO ?>">
      </div>
      <div class="form-group col-12">
        <label for="disciplina">DISCIPLINA</label>
        <select id="disciplina" class="form-control" name="disciplina">
          <?php
          while ($linha = mysqli_fetch_array($consulta_disciplinas_disponiveis)) {
            echo "<option value='" . $linha['ID_DISCIPLINA'] . "'>" . $linha['NOME_DISCIPLINA'] . "</option>";
          } ?>
        </select>
      </div>
      <div class="form-group col-12">
        <label for="professor">professor</label>
        <select id="professor" class="form-control" name="professor">
          <?php
          while ($linha = mysqli_fetch_array($consulta_professores)) {
            echo "<option value='" . $linha['ID_PROFESSOR'] . "'>" . $linha['NOME_PROFESSOR'] . "</option>";
          } ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Criar Relação</button>
      </div>
    </div>
  </form>
</div>
<hr>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">DISCIPLINA</th>
      <th scope="col">professor</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($linha = mysqli_fetch_array($consulta_relacoes)) {
      $ID_RELACAO = $linha["ID_TURMA_DISC_PROFE"];
      $NOME_DISCIPLINA = $linha["NOME_DISCIPLINA"];
      $NOME_DISCIPLINA = str_replace(" ", "%20", $NOME_DISCIPLINA);
      $ID_DISCIPLINA = $linha["ID_DISCIPLINA"];
      echo "<tr>";
      echo "<th>" . $linha["NOME_DISCIPLINA"] . "</th>";
      echo "<td>" . $linha["NOME_PROFESSOR"] . "</td>";
      echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=relacao_prof_edit&id_relacao=$ID_RELACAO&nome_disciplina=$NOME_DISCIPLINA&id_disciplina=$ID_DISCIPLINA&id_curso=$ID_CURSO&id_turma=$ID_TURMA&nome_curso=$NOME_CURSO'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/relacao_prof.php?relacao_id=$ID_RELACAO'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>";
      echo "<tr>";
    }
    ?>
  </tbody>
</table>