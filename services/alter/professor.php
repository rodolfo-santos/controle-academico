<?php
include '../../db.php';

$id_professor = $_POST['id_professor'];
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

$query = "UPDATE PROFESSOR
          SET CPF = '$cpf',
              RG = '$rg', 
              NOME_PROFESSOR = '$nome', 
              DATA_NASCIMENTO = '$data_nasc',
              TELEFONE = '$telefone',
              RUA = '$rua',
              NUMERO = '$numero',
              BAIRRO = '$bairro',
              CIDADE = '$cidade',
              UF = '$uf'
          WHERE ID_PROFESSOR = $id_professor ";

$execucao = mysqli_query($conexao, $query);
if( !$execucao ) {
  echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
  $erro = "Para alterar o professor primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:'.mysqli_error( $conexao ).'<br>';
  header("location:../../index.php?pagina=professores&erro=$erro" );
} else {
  header("location:../../index.php?pagina=professores" );
}