<?php
include '../../db.php';

$nome_curso = $_POST['nome_curso'];
$carga_curso = $_POST['carga_curso'];
$descricao_curso = $_POST['descricao_curso'];

$query = "INSERT INTO CURSOS VALUES( NULL, '$nome_curso', '$carga_curso', '$descricao_curso' )";

mysqli_query($conexao, $query);
header('location:'.$_SERVER['HTTP_REFERER']);