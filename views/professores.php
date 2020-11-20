<?php
@$erro = $_GET["erro"];
if($erro) echo "<script> window.alert('$erro')</script>";
?>


<h1>Professores</h1>


<div class="row">
  <div class="col-12 d-flex justify-content-end">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inserir_professor_form" aria-expanded="false" aria-controls="inserir_professor_form">
    Inserir Novo Professor
  </button>
  </div>
</div>

<div class="collapse" id="inserir_professor_form">
<form method="post" action="services/insert/professor.php" class="mb-4 pb-4 bg-muted p-4">
  <fieldset>
    <legend>Informações Básicas</legend>
    <div class="row">
      <div class="form-group col-8">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do Professor">
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
        <input type="text" class="form-control" id="numero" name="numero" required>
      </div>
    </div>
  </fieldset>

  <div class="row">
    <div class="form-group col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Inserir Novo Professor</button>
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
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($linha = mysqli_fetch_array($consulta_professores)) {
        $ID_PROFESSOR = $linha["ID_PROFESSOR"];
        echo "<tr>";
        echo "<th>".$linha["ID_PROFESSOR"]."</th>";
        echo "<td>".$linha["NOME_PROFESSOR"]."</td>";
        echo "<td>".$linha["CPF"]."</td>";
        echo "<td>".$linha["RG"]."</td>";
        echo "<td>".$linha["DATA_NASCIMENTO"]."</td>";
        echo "<td>".$linha["TELEFONE"]."</td>";
        echo "<td class='d-flex justify-content-around'> 
                <a href='?pagina=professor_edit&id_professor=$ID_PROFESSOR'>
                  <i class='fas fa-pen cursor-pointer edit'></i> 
                </a>
                <a href='services/delete/professor.php?professor=$ID_PROFESSOR'>
                 <i class='fas fa-trash cursor-pointer delete'></i> 
                </a>
              </td>";
        echo "<tr>";
      }
    ?>
  </tbody>
</table>