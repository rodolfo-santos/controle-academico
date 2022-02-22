<?php
include '../../db.php';

$relacao = $_GET['relacao_id'];
$query = "DELETE FROM turma_disc_profe WHERE ID_TURMA_DISC_PROFE = '$relacao';";

$execucao = mysqli_query($conexao, $query);
if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para deletar a relação primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
} else {
  header('location:' . $_SERVER['HTTP_REFERER']);
}
