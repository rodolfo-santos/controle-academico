<?php
  @$erro = $_GET["erro"];
  if($erro) echo "<script> window.alert('$erro')</script>";

  $query = "SELECT * FROM CURSOS";
  $consulta_curso_modal = mysqli_query($conexao, $query);
?>


<h1>Cursos</h1>
<div class="row">
  <div class="col-12 d-flex justify-content-end">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inserir_curso" aria-expanded="false" aria-controls="inserir_curso">
    Inserir Novo Curso
  </button>
  </div>
</div>


<div class="collapse" id="inserir_curso">
  <form method="post" action="services/insert/curso.php" class="bg-muted p-4">
    <div class="row">
      <div class="form-group col-6">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome_curso" placeholder="Nome do Curso">
      </div>
      <div class="form-group col-6">
        <label for="carga_curso">Periodicidade - Carga Horária</label>
        <input type="number" min="1600" max="3600" class="form-control" id="carga_curso" name="carga_curso" placeholder="Carga Horária">
      </div>
      <div class="form-group col-12">
        <label for="descricao_curso">Descrição</label>
        <textarea class="form-control" id="descricao_curso" name="descricao_curso" rows="3"></textarea>
      </div>
      <div class="form-group col-12 text-right">
        <button type="submit" class="btn btn-primary">Inserir Curso</button>
      </div>
    </div>
  </form>
</div>


<hr>

<table class="table table-hover mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col" class="text-center">Periodicidade - Carga Horária</th>
      <th scope="col" class="text-center">Descrição</th>
      <th scope="col" class="text-center"></th>
      <th scope="col" class="text-center"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($linha = mysqli_fetch_array($consulta_cursos)) {
        $ID_CURSO = $linha["ID_CURSO"];
        $NOME_CURSO = $linha["NOME_CURSO"];
        $NOME_CURSO = str_replace(" ", "%20", $NOME_CURSO);
        $LINK = "/?pagina=disciplinas&id_curso=$ID_CURSO&nome_curso=$NOME_CURSO";
        echo "<tr>";
        echo "<th>".$linha["ID_CURSO"]."</th>";
        echo "<td>".$linha["NOME_CURSO"]."</td>";
        echo "<td class='text-center'>".$linha["CARGA_HORARIA"]."</td>";
        echo "<td><a data-toggle='modal' data-target='.curso-$ID_CURSO' class='cursor-pointer'>Ver Descrição</a></td>";
        echo "<td class='text-center'> <a href='$LINK'> Disciplinas </a></td>";
        echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=curso_edit&id_curso=$ID_CURSO'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/curso.php?curso=$ID_CURSO'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>";
        echo "<tr>";
      }
    ?>
  </tbody>
</table>


<?php while($linha = mysqli_fetch_array($consulta_curso_modal)) { ?>

<div class="modal fade curso-<?=$linha["ID_CURSO"]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content p-4">
        <strong><p>Descrição</p></strong>
        <p><?= $linha["DESCRICAO"]; ?></p>
      </div>
  </div>
</div>

<?php } ?>