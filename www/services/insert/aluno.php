<?php
include '../../db.php';

$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$turma = $_POST['turma'];


$query = "INSERT INTO alunos VALUES( NULL, '$cpf', '$rg', '$nome', '$data_nasc', '$telefone', '$rua', '$numero', '$bairro', '$cidade', '$uf', '$turma' )";

mysqli_query($conexao, $query);
header('location:' . $_SERVER['HTTP_REFERER']);
