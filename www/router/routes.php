<?php

@$pagina = $_GET['pagina'];

switch ($pagina) {
  case 'cursos': include 'views/cursos.php'; break;
  case 'alunos': include 'views/alunos.php'; break;
  case 'turmas': include 'views/turmas.php'; break;
  case 'professores': include 'views/professores.php'; break;
  case 'disciplinas': include 'views/disciplinas.php'; break;
  case 'relacao_prof': include 'views/relacao_prof.php'; break;

  case 'aluno_edit': include 'views/aluno_edit.php'; break;
  case 'curso_edit': include 'views/curso_edit.php'; break;
  case 'disciplina_edit': include 'views/disciplina_edit.php'; break;
  case 'professor_edit': include 'views/professor_edit.php'; break;
  case 'relacao_prof_edit': include 'views/relacao_prof_edit.php'; break;
  case 'turma_edit': include 'views/turma_edit.php'; break;
  
  default: include 'views/home.php'; break;
}