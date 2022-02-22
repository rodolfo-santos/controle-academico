<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/custom.css">
  <title>Controle da Faculdade</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Controle da Faculdade</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="?pagina=cursos" id="nav-cursos">Cursos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?pagina=alunos" id="nav-alunos">Alunos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?pagina=turmas" id="nav-turmas">Turmas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?pagina=professores" id="nav-professores">Professores</a>
      </li>
    </ul>
  </div>
</nav>

<script>
  let c = document.querySelector("#nav-cursos")
  let a = document.querySelector("#nav-alunos")
  let t = document.querySelector("#nav-turmas")
  let p = document.querySelector("#nav-professores")

  let h = window.location.href;

  if(h == c) c.classList.add("text-white")
  if(h == a) a.classList.add("text-white")
  if(h == t) t.classList.add("text-white")
  if(h == p) p.classList.add("text-white")

</script>

<main class="container">
