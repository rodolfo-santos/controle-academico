<?php
include '../../db.php';

$id_disciplina = $_POST['id_disciplina'];
$id_curso = $_POST['id_curso'];
$nome_curso = $_POST['nome_curso'];
$nome = $_POST['nome'];
$ementa = $_POST['ementa'];


$query = "UPDATE DISCIPLINAS
          SET NOME_DISCIPLINA = '$nome', EMENTA = '$ementa' WHERE ID_DISCIPLINA = $id_disciplina ";

$execucao = mysqli_query($conexao, $query);

if( !$execucao ) {
  echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
  $erro = "Para alterar a disciplina primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:'.mysqli_error( $conexao ).'<br>';
  header("location:../../index.php?pagina=disciplinas&id_curso=$id_curso&nome_curso=$nome_curso" );
} else {
  header("location:../../index.php?pagina=disciplinas&id_curso=$id_curso&nome_curso=$nome_curso" );
}