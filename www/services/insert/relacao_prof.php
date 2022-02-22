<?php
include '../../db.php';

$turma = $_POST["turma"];
$curso = $_POST["curso"];
$disciplina = $_POST["disciplina"];
$professor = $_POST["professor"];
$href = $_SERVER['HTTP_REFERER'];

echo "INSERT INTO turma_disc_profe VALUES( NULL, '$turma', '$disciplina', '$professor' )";

$query = "INSERT INTO turma_disc_profe VALUES( NULL, '$turma', '$disciplina', '$professor' )";

mysqli_query($conexao, $query);
header('location:'.$_SERVER['HTTP_REFERER']);