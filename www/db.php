<?php

$servidor = 'db';
$usuario = 'root';
$senha = 'root';
$db = 'programacao_web';

$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die(mysqli_error());


$query = "SELECT * FROM cursos";
$consulta_cursos = mysqli_query($conexao, $query);

$query = "SELECT * FROM alunos";
$consulta_alunos = mysqli_query($conexao, $query);

$query = "SELECT * FROM professor";
$consulta_professores = mysqli_query($conexao, $query);

$query = "SELECT turmas.ID_TURMA, cursos.ID_CURSO, cursos.NOME_CURSO FROM turmas, cursos WHERE turmas.ID_CURSO = cursos.ID_CURSO";
$consulta_turmas = mysqli_query($conexao, $query);
