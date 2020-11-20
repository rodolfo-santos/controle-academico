<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "programacao_web";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

$query = "SELECT * FROM CURSOS";
$consulta_cursos = mysqli_query($conexao, $query);

$query = "SELECT * FROM ALUNOS";
$consulta_alunos = mysqli_query($conexao, $query);

$query = "SELECT * FROM PROFESSOR";
$consulta_professores = mysqli_query($conexao, $query);

$query = "SELECT TURMAS.ID_TURMA, CURSOS.ID_CURSO, CURSOS.NOME_CURSO FROM TURMAS, CURSOS WHERE TURMAS.ID_CURSO = CURSOS.ID_CURSO";
$consulta_turmas = mysqli_query($conexao, $query);