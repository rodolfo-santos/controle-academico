<?php
include '../../db.php';

$turma = $_GET['turma'];
$query = "DELETE FROM turmas WHERE ID_TURMA = '$turma';";

$execucao = mysqli_query($conexao, $query);
if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para deletar a turma primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
} else {
  header('location:' . $_SERVER['HTTP_REFERER']);
}
