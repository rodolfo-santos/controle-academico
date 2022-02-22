<?php
include '../../db.php';

$id_turma = $_POST['id_turma'];
$id_curso = $_POST['id_curso'];
$id_original = $_POST['id_original'];

$query = "UPDATE turmas
          SET ID_CURSO = $id_curso, 
              ID_TURMA = '$id_turma'
          WHERE ID_TURMA = '$id_original' ";

echo $query;

$execucao = mysqli_query($conexao, $query);

if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para alterar a turma primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
  header("location:../../index.php?pagina=turmas&erro=$erro");
} else {
  header("location:../../index.php?pagina=turmas");
}
