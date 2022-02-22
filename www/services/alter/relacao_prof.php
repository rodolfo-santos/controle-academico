<?php
include '../../db.php';

$id_professor = $_POST['id_professor'];
$id_relacao   = $_POST['id_relacao'];
$ID_TURMA   = $_POST['turma'];
$NOME_CURSO   = $_POST['nome_curso'];
$ID_CURSO   = $_POST['id_curso'];

$query = "UPDATE turma_disc_profe
          SET ID_PROFESSOR = $id_professor
          WHERE ID_TURMA_DISC_PROFE = $id_relacao ";

$execucao = mysqli_query($conexao, $query);
echo $query;
if (!$execucao) {
  echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
  $erro = "Para alterar o registro primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
  header("location:../../index.php?pagina=relacao_prof&turma=$ID_TURMA&curso=$NOME_CURSO&id_curso=$ID_CURSO");
} else {
  header("location:../../index.php?pagina=relacao_prof&turma=$ID_TURMA&curso=$NOME_CURSO&id_curso=$ID_CURSO");
}
