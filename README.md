<img src="./docs/assets/banner.png" />

<br/>

<div align="center">
  <a href="https://www.php.net/">
    <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
  </a>
  <a href="https://www.mysql.com/">
    <img alt="MYSQL" src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white">
  </a>
  <a href="https://developer.mozilla.org/pt-BR/docs/Web/HTML">
    <img alt="HTML" src="https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white">
  </a>
</div>
<div align="center">
  <a href="https://developer.mozilla.org/pt-BR/docs/Web/CSS">
    <img alt="CSS" src="https://img.shields.io/badge/CSS-239120?&style=for-the-badge&logo=css3&logoColor=white">
  </a>
  <a href="https://www.mysql.com/">
    <img alt="MYSQL" src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white">
  </a>
  <a href="https://www.docker.com/">
    <img src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white">
  </a>
</div>



<br />

# 💻 Simple CRUD (PHP/MYSQL)

CRUD simples em PHP e MYSQL para controle de Turmas de Faculdade

## 🚀 Setup do Projeto

### Configuração local com docker (Recomendado)

- [Instale o Docker](https://docs.docker.com/get-docker/)
- [Instale o docker-compose](https://docs.docker.com/compose/install/)
- Abra a pasta raíz do projeto no terminal e execute o comando: 
> ```sh
> docker-compose up
> ```
- Acesso a Aplicação: http://localhost:80
- Acesso ao phpMyAdmin: http://localhost:8080
  - Usuário: root
  - Senha: root

### Configuração local sem docker

Requerimentos:
- PHP 7
- MYSQL 5
- Apache

Recomendo instalar o conjunto através de uma das ferramentas (Escolha a recomendada para o seu sistema)
[XAMPP](https://www.apachefriends.org/pt_br/index.html)
[WAMP](https://www.wampserver.com/en/)
[LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-pt)
[MAMP](https://www.mamp.info/en/windows/)

Independente da sua escolha você deve colocar o projeto dentro da pasta do site recomendada pela documentação de cada ferramenta
e importe através do phpmyadmin o arquivo que corresponde ao banco: `./dump/programacao_web.sql`

