<?php
@$erro = $_GET["erro"];
if($erro) echo "<script> window.alert('$erro')</script>";
?>

<h1>Turmas</h1>

<div class="row">
  <div class="col-12 d-flex justify-content-end">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inserir_turma" aria-expanded="false" aria-controls="inserir_turma">
    Inserir Nova Turma
  </button>
  </div>
</div>


<div class="collapse" id="inserir_turma">
  <form method="post" action="services/insert/turma.php" class="bg-muted p-4">
    <div class="row">
      <div class="form-group col-6">
        <label for="curso">Curso</label>
        <select id="curso" class="form-control" name="curso">
          <?php
            while($linha = mysqli_fetch_array($consulta_cursos)) {
            echo "<option value='".$linha['ID_CURSO']."'>".$linha['NOME_CURSO']." - ".$linha['NOME_CURSO']."</option>";
          } ?>
        </select>    
      </div>
      <div class="form-group col-5">
        <label for="turma">CÓDIGO DA TURMA</label>
        <input type="text" maxlength="4" class="form-control" id="turma" name="turma" placeholder="Código da Turma">
      </div>
      <div class="form-group col-1 d-flex align-items-end justify-content-end">
        <button type="submit" class="btn btn-primary">Inserir</button>
      </div>
    </div>
  </form>
</div>




<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Turma</th>
      <th scope="col">Curso</th>
      <th scope="col" class="text-center">Alunos</th>
      <th scope="col" class="text-center">Disciplinas</th>
      <th scope="col" class="text-center"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($linha = mysqli_fetch_array($consulta_turmas)) {
        $ID_TURMA = $linha["ID_TURMA"];
        $ID_CURSO = $linha["ID_CURSO"];
        $NOME_CURSO = $linha["NOME_CURSO"];
        $NOME_CURSO = str_replace(" ", "%20", $NOME_CURSO);
        $LINK_ALUNOS = "/?pagina=alunos&turma=$ID_TURMA";
        $LINK_DISCIPLINAS = "/?pagina=relacao_prof&turma=$ID_TURMA&curso=$NOME_CURSO&id_curso=$ID_CURSO";

        echo "<tr>";
        echo "<td>".$linha["ID_TURMA"]."</td>";
        echo "<td>".$linha["NOME_CURSO"]."</td>";
        echo "<td class='text-center'> <a href='$LINK_ALUNOS'> Alunos </a> </td>";
        echo "<td class='text-center'> <a href='$LINK_DISCIPLINAS'> Disciplinas </a> </td>";
        echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=turma_edit&id_turma=$ID_TURMA'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/turma.php?turma=$ID_TURMA'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>"; 
        echo "<tr>";
      }
    ?>
  </tbody>
</table>