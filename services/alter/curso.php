<?php
include '../../db.php';

$id_curso = $_POST['id_curso'];
$nome = $_POST['nome'];
$carga = $_POST['carga'];
$descricao = $_POST['descricao'];


$query = "UPDATE CURSOS
          SET NOME_CURSO = '$nome',
              CARGA_HORARIA = '$carga',
              DESCRICAO = '$descricao'
          WHERE ID_CURSO = $id_curso ";

$execucao = mysqli_query($conexao, $query);
if( !$execucao ) {
  echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
  $erro = "Para alterar o curso primeiro você deve apagar suas relações.";
  $erro = str_replace(" ", "%20", $erro);

  echo 'Mensagem de erro:'.mysqli_error( $conexao ).'<br>';
  header("location:../../index.php?pagina=cursos&erro=$erro" );
} else {
  header("location:../../index.php?pagina=cursos" );
}