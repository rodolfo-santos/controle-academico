<?php
include '../../db.php';

$disciplina = $_GET['disciplina'];
$query = "DELETE FROM disciplinas WHERE ID_DISCIPLINA = $disciplina";

$execucao = mysqli_query($conexao, $query);
if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para deletar a disciplina primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  // echo 'Mensagem de erro:'.mysqli_error( $conexao ).'<br>';
  header('location:' . $_SERVER['HTTP_REFERER'] . "&erro=$erro");
} else {
  header('location:' . $_SERVER['HTTP_REFERER']);
}
