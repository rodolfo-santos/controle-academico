<?php
include '../../db.php';

$id_aluno = $_POST['id_aluno'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$turma = $_POST['turma'];

$query = "UPDATE alunos
          SET CPF = '$cpf',
              RG = '$rg', 
              NOME_ALUNO = '$nome', 
              DATA_NASCIMENTO = '$data_nasc',
              TELEFONE = '$telefone',
              RUA = '$rua',
              NUMERO = '$numero',
              BAIRRO = '$bairro',
              CIDADE = '$cidade',
              UF = '$uf',
              ID_TURMA = '$turma'
          WHERE ID_ALUNO = $id_aluno ";

$execucao = mysqli_query($conexao, $query);
if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para alterar o aluno primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
  header("location:../../index.php?pagina=alunos&erro=$erro");
} else {
  header("location:../../index.php?pagina=alunos");
}
