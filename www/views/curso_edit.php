<?php
$ID_CURSO = $_GET["id_curso"];

@$erro = $_GET["erro"];
if ($erro) echo "<script> window.alert('$erro')</script>";

$query = "SELECT * from cursos WHERE ID_CURSO = $ID_CURSO";
$consulta_curso = mysqli_query($conexao, $query);
?>

<?php while ($linha = mysqli_fetch_array($consulta_curso)) { ?>

  <h1>
    Editando Curso: <?= $linha["ID_CURSO"]; ?>
  </h1>

  <form method="post" action="services/alter/curso.php" class="bg-muted p-4">
    <input type="text" value="<?= $linha["ID_CURSO"]; ?>" name="id_curso" class="d-none">
    <div class="row">
      <div class="form-group col-6">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Curso" value="<?= $linha["NOME_CURSO"]; ?>">
      </div>
      <div class="form-group col-6">
        <label for="carga_curso">Carga Horária</label>
        <input type="number" min="1600" max="3600" class="form-control" id="carga_curso" name="carga" placeholder="Carga Horária" value="<?= $linha["CARGA_HORARIA"]; ?>">
      </div>
      <div class="form-group col-12">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" rows="3" name="descricao"><?= $linha["DESCRICAO"] ?></textarea>
      </div>
      <div class="form-group col-12 text-right">
        <button type="submit" class="btn btn-primary">Salvar Descricao</button>
      </div>
    </div>
  </form>

<?php } ?>