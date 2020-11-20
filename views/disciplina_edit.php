<?php

$ID_DISCIPLINA = $_GET["id_disciplina"];
$NOME_CURSO = $_GET["nome_curso"];

@$erro = $_GET["erro"];
if($erro) echo "<script> window.alert('$erro')</script>";

$query = "SELECT * FROM DISCIPLINAS WHERE ID_DISCIPLINA = $ID_DISCIPLINA";
$consulta_disciplina = mysqli_query($conexao, $query);

?>

<?php while($linha = mysqli_fetch_array($consulta_disciplina)) { ?>

<h1>
    Edição do Disciplina: <?= $linha["ID_DISCIPLINA"]; ?>
</h1>

<form method="post" action="services/alter/disciplina.php" class="mb-4 pb-4 bg-muted p-4">
  <input type="text" value="<?= $linha["ID_DISCIPLINA"] ;?>" name="id_disciplina" class="d-none">
  <input type="text" value="<?= $linha["ID_CURSO"] ;?>" name="id_curso" class="d-none">
  <input type="text" value="<?= $NOME_CURSO ;?>" name="nome_curso" class="d-none">
  <div class="row">
    <div class="form-group col-6">
      <label for="nome">NOME DA DISCIPLINA</label>
      <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome da Disciplina" value="<?= $linha["NOME_DISCIPLINA"]?>">
    </div>
    <div class="form-group col-12">
        <label for="ementa">EMENTA</label>
        <textarea class="form-control" id="ementa" name="ementa" rows="3"><?= $linha["EMENTA"]?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Atualizar Disciplina</button>
    </div>
  </div>

  </div>
</form>

<?php } ?>