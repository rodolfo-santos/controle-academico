<?php
include '../../db.php';

$professor = $_GET['professor'];
$query = "DELETE FROM PROFESSOR WHERE ID_PROFESSOR = '$professor';";

$execucao = mysqli_query($conexao, $query);
if( !$execucao ) {
  echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
  $erro = "Para deletar o professor primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:'.mysqli_error( $conexao ).'<br>';
  header('location:'.$_SERVER['HTTP_REFERER']."&erro=$erro" );
} else {
  header('location:'.$_SERVER['HTTP_REFERER']);
}
