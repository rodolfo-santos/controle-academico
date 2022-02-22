<?php
$ID_CURSO = $_GET['id_curso'];
$NOME_CURSO = $_GET['nome_curso'];
$query = "SELECT disciplinas.ID_DISCIPLINA, disciplinas.NOME_DISCIPLINA, disciplinas.ID_CURSO, disciplinas.EMENTA,
              cursos.NOME_CURSO 
              FROM disciplinas, cursos 
              WHERE disciplinas.ID_CURSO = $ID_CURSO
              AND disciplinas.ID_CURSO = cursos.ID_CURSO;";
$consulta_disciplinas = mysqli_query($conexao, $query);
$consulta_disciplina_modal = mysqli_query($conexao, $query);



$query = "SELECT NOME_CURSO FROM cursos WHERE ID_CURSO = $ID_CURSO";
$consulta_nome_curso = mysqli_query($conexao, $query);

@$erro = $_GET["erro"];
if ($erro) echo "<script> window.alert('$erro')</script>";
?>

<h1>disciplinas -
  <?php
  while ($linha = mysqli_fetch_array($consulta_nome_curso)) {
    echo $linha['NOME_CURSO'];
  };
  ?>
</h1>


<div class="row">
  <div class="col-12 d-flex justify-content-end">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inserir_disciplina_form" aria-expanded="false" aria-controls="inserir_disciplina_form">
      Inserir Disciplina
    </button>
  </div>
</div>

<div class="collapse" id="inserir_disciplina_form">
  <form method="post" action="services/insert/disciplina.php" class="mb-4 pb-4 bg-muted p-4">
    <div class="row">
      <div class="form-group col-7">
        <label for="nome">NOME DA DISCIPLINA</label>
        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome da Disciplina">
      </div>
      <div class="form-group col-5">
        <label for="nome">Curso</label>
        <input type="text" name="curso" class="d-none" value="<?= $ID_CURSO ?>">
        <input type="text" maxlength="4" class="form-control" id="curso" placeholder="Curso" readonly value="<?= $NOME_CURSO ?>">
      </div>
      <div class="form-group col-2">
        <label for="nome">Carga Horária</label>
        <input type="number" min='20' max='160' name="carga" class="form-control" id="carga" placeholder="Carga Horária">
      </div>
      <div class="form-group col-10">
        <label for="nome">Ementa</label>
        <textarea class="form-control" id="ementa" rows="3" name="ementa"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Inserir nova Disciplina</button>
      </div>
    </div>

</div>
</form>
</div>

<hr>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Curso</th>
      <th scope="col">Ementa</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($linha = mysqli_fetch_array($consulta_disciplinas)) {
      $ID_DISCIPLINA = $linha["ID_DISCIPLINA"];
      echo "<tr>";
      echo "<th>" . $linha["ID_DISCIPLINA"] . "</th>";
      echo "<td>" . $linha["NOME_DISCIPLINA"] . "</td>";
      echo "<td>" . $linha["NOME_CURSO"] . "</td>";
      echo "<td><a data-toggle='modal' data-target='.disciplina-$ID_DISCIPLINA' class='cursor-pointer'>Ver Ementa</a></td>";
      echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=disciplina_edit&id_disciplina=$ID_DISCIPLINA&nome_curso=$NOME_CURSO'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/disciplina.php?disciplina=$ID_DISCIPLINA'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>";
      echo "<tr>";
    }
    ?>
  </tbody>
</table>

<?php while ($linha = mysqli_fetch_array($consulta_disciplina_modal)) { ?>

  <div class="modal fade disciplina-<?= $linha["ID_DISCIPLINA"] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content p-4">
        <strong>
          <p>Ementa</p>
        </strong>
        <p><?= $linha["EMENTA"] ?></p>
      </div>
    </div>
  </div>

<?php } ?>