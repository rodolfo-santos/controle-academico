<?php
@$turma = $_GET["turma"];

$query = "SELECT * FROM ALUNOS";
$consulta_alunos_modal = mysqli_query($conexao, $query);

if($turma) {
  $query = "SELECT * FROM ALUNOS WHERE ID_TURMA = '$turma'";
  $consulta_alunos = mysqli_query($conexao, $query);
  $consulta_alunos_modal = mysqli_query($conexao, $query);
}


@$erro = $_GET["erro"];
if($erro) echo "<script> window.alert('$erro')</script>";
?>


<h1>Alunos</h1>

<div class="row">
  <div class="col-12 d-flex justify-content-end">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inserir_aluno_form" aria-expanded="false" aria-controls="inserir_aluno_form">
    Inserir Novo Aluno
  </button>
  </div>
</div>

<div class="collapse" id="inserir_aluno_form">
<form method="post" action="services/insert/aluno.php" class="mb-4 pb-4 bg-muted p-4">
  <fieldset>
    <legend>Informações Básicas</legend>
    <div class="row">
      <div class="form-group col-8">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do Aluno">
      </div>
      <div class="form-group col-4">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="CPF" maxlength="11">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" name="rg" required placeholder="RG" maxlength="9">
      </div>
      <div class="form-group col-4">
        <label for="data_nasc">Data Nascimento</label>
        <input type="date" class="form-control datepicker" id="data_nasc" name="data_nasc" required>
      </div>
      <div class="form-group col-4">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="Telefone">
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>Endereço</legend>
    <div class="row">
      <div class="form-group col-8">
        <label for="rua">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" required>
      </div>
      <div class="form-group col-4">
        <label for="numeroc">Nº</label>
        <input type="text" class="form-control" id="numero" name="numero" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" required>
      </div>
      <div class="form-group col-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required>
      </div>
      <div class="form-group col-4">
        <label for="uf">UF</label>
        <input type="text" class="form-control" id="uf" name="uf" required>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>Matrícula</legend>
    <div class="row">
      <div class="form-group col-4">
        <label for="turma">Turma</label>
        <input id="turma_none" type="text" class="d-none">
        <select id="turma" class="form-control" name="turma">
          <?php
            while($linha = mysqli_fetch_array($consulta_turmas)) {
              if($linha['ID_TURMA'] == $turma){
                echo "<option selected value='".$linha['ID_TURMA']."'>".$linha['ID_TURMA']." - ".$linha['NOME_CURSO']."</option>";
                echo "<script> 
                      document.querySelector('#turma').setAttribute('disabled',  'disabled'); 
                      document.querySelector('#turma').setAttribute('name',  ''); 
                      document.querySelector('#turma_none').setAttribute('name',  'turma'); 
                      document.querySelector('#turma_none').setAttribute('value',  '$turma'); 
                      </script>";
            };
            echo "<option value='".$linha['ID_TURMA']."'>".$linha['ID_TURMA']." - ".$linha['NOME_CURSO']."</option>";
          } ?>
        </select>    
      </div>
    </div>
  </fieldset>

  <div class="row">
    <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Inserir novo Aluno</button>
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
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">Data.Nasc</th>
      <th scope="col">Telefone</th>
      <th scope="col">Turma</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php while($linha = mysqli_fetch_array($consulta_alunos)) {
        $ID_ALUNO = $linha["ID_ALUNO"];
        echo "<tr>";
        echo "<th>".$linha["ID_ALUNO"]."</th>";
        echo "<td><a data-toggle='modal' data-target='.aluno-$ID_ALUNO' class='cursor-pointer'>".$linha["NOME_ALUNO"]."</a></td>";
        echo "<td>".$linha["CPF"]."</td>";
        echo "<td>".$linha["RG"]."</td>";
        echo "<td>".$linha["DATA_NASCIMENTO"]."</td>";
        echo "<td>".$linha["TELEFONE"]."</td>";
        echo "<td>".$linha["ID_TURMA"]."</td>";
        echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=aluno_edit&id_aluno=$ID_ALUNO'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/aluno.php?aluno=$ID_ALUNO'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>"; 
         echo "<tr>";
      }
    ?>
  </tbody>
</table>

<?php while($linha = mysqli_fetch_array($consulta_alunos_modal)) { ?>
<div class="modal fade aluno-<?= $linha["ID_ALUNO"]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <form class="">
        <fieldset>
          <legend>Informações Básicas</legend>
          <div class="row">
            <div class="form-group col-8">
              <label for="nome">Nome Aluno</label>
              <input type="text" class="form-control" id="nome" name="nome" disabled required placeholder="Nome do Curso" value="<?= $linha["NOME_ALUNO"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="CPF" maxlength="11" disabled value="<?= $linha["CPF"] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-4">
              <label for="rg">RG</label>
              <input type="text" class="form-control" id="rg" name="rg" required placeholder="RG" maxlength="9" disabled value="<?= $linha["RG"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="data_nasc">Data Nascimento</label>
              <input type="text" class="form-control" id="data_nasc" name="data_nasc" required disabled value="<?= $linha["DATA_NASCIMENTO"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="Telefone" disabled value="<?= $linha["TELEFONE"] ?>">
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend>Endereço</legend>
          <div class="row">
            <div class="form-group col-8">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" id="rua" name="rua" required disabled value="<?= $linha["RUA"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="numeroc">Nº</label>
              <input type="text" class="form-control" id="numero" name="numero" required disabled value="<?= $linha["NUMERO"] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-4">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" required disabled value="<?= $linha["BAIRRO"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" required disabled value="<?= $linha["CIDADE"] ?>">
            </div>
            <div class="form-group col-4">
              <label for="uf">UF</label>
              <input type="text" class="form-control" id="uf" name="uf" required disabled value="<?= $linha["UF"] ?>">
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend>Matrícula</legend>
          <div class="row">
          <div class="form-group col-4">
              <label for="turma">TURMA</label>
              <input type="text" class="form-control" id="turma" name="turma" required disabled value="<?= $linha["ID_TURMA"] ?>">
          </div>
          </div>
        </fieldset>
      </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>