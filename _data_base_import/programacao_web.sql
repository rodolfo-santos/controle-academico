-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2020 às 23:04
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `programacao_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `ID_ALUNO` int(11) NOT NULL,
  `CPF` varchar(255) NOT NULL,
  `RG` varchar(255) NOT NULL,
  `NOME_ALUNO` varchar(255) NOT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL,
  `TELEFONE` varchar(255) DEFAULT NULL,
  `RUA` varchar(255) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `BAIRRO` varchar(255) DEFAULT NULL,
  `CIDADE` varchar(255) DEFAULT NULL,
  `UF` varchar(255) DEFAULT NULL,
  `ID_TURMA` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`ID_ALUNO`, `CPF`, `RG`, `NOME_ALUNO`, `DATA_NASCIMENTO`, `TELEFONE`, `RUA`, `NUMERO`, `BAIRRO`, `CIDADE`, `UF`, `ID_TURMA`) VALUES
(12, '11111111111', '222222222', 'RODRIGO MAROMBEIRO2', '2020-11-01', '123123213213', 'Oswaldo de Pinto Guimarães', 0, 'Jardim Cachaça', 'SAO JOSE DOS CAMPOS', 'SP', 'BDDA'),
(13, '12321312321', '312312321', 'asdfsadfafasdfsdaf', '2020-11-19', '123213213', 'dsfasdfsadf', 23323, 'asdfsadf', 'sjc', 'sp', 'ENGA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `ID_CURSO` int(11) NOT NULL,
  `NOME_CURSO` varchar(255) NOT NULL,
  `CARGA_HORARIA` int(11) NOT NULL,
  `DESCRICAO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`ID_CURSO`, `NOME_CURSO`, `CARGA_HORARIA`, `DESCRICAO`) VALUES
(2, 'BANCO DE DADOS', 1601, 'Olá, Nesta formação, você irá aprender sobre as ferramentas para desenvolvedores dos principais bancos de dados do mercado: o MySQL, o Oracle, o SQL Server, o PostGreSQL e o MongoDB. Serão abordados tópicos como definição de tabelas, criação de consultas, operações de manipulação de dados, utilização dos JOINs, views, funções, transações, triggers e stored procedures. Também serão abordados tópicos como schema design, agregações, índices e replicação ao abordarmos o MongoDB.'),
(3, 'REDES DE COMPUTADORES', 1600, ''),
(4, 'LOGÍSTICA', 1600, ''),
(5, 'ADMINISTRACAO', 1600, ''),
(9, 'ENGENHARIA', 3600, ''),
(10, 'ROBÓTICA', 3599, ''),
(12, 'ENGENHARIA CIVIL', 3600, 'ENGENHARIA MUITO LEGAL'),
(13, 'ANALISE DE SISTEMAS', 1600, 'CURSO MUITO BACANA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `ID_DISCIPLINA` int(11) NOT NULL,
  `NOME_DISCIPLINA` varchar(255) NOT NULL,
  `ID_CURSO` int(11) NOT NULL,
  `CARGA_HORARIA` int(11) NOT NULL,
  `EMENTA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`ID_DISCIPLINA`, `NOME_DISCIPLINA`, `ID_CURSO`, `CARGA_HORARIA`, `EMENTA`) VALUES
(6, 'AMBIENTES DE REDES LOCAIS DE COMPUTADORE', 2, 0, 'TESTES'),
(7, 'ALGORITMOS E PROGRAMAÇÃO', 2, 0, ''),
(8, 'ANÁLISE E OTIMIZAÇÃO DE CONSULTAS', 2, 0, ''),
(9, 'BANCO DE DADOS OBJETO-RELACIONAL', 2, 0, ''),
(10, 'BANCO DE DADOS PARALELOS E DISTRIBUÍDOS', 2, 0, ''),
(11, 'APLICAÇÕES EM REDES E ADMINISTRAÇÃO DE SISTEMAS', 3, 0, ''),
(12, 'ARQUITETURA DE COMPUTADORES PESSOAIS', 3, 0, ''),
(13, 'ARQUITETURA DE SERVIDORES', 3, 0, ''),
(15, 'SISTEMAS DE INFORMAÇÃO', 2, 0, ''),
(16, 'Mecânica Quântica', 9, 0, ''),
(17, 'Engenharia de Mutações', 9, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `ID_PROFESSOR` int(11) NOT NULL,
  `CPF` int(11) NOT NULL,
  `RG` int(11) NOT NULL,
  `NOME_PROFESSOR` varchar(255) NOT NULL,
  `DATA_NASCIMENTO` varchar(255) DEFAULT NULL,
  `TELEFONE` varchar(255) DEFAULT NULL,
  `RUA` varchar(255) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `BAIRRO` varchar(255) DEFAULT NULL,
  `CIDADE` varchar(255) DEFAULT NULL,
  `UF` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`ID_PROFESSOR`, `CPF`, `RG`, `NOME_PROFESSOR`, `DATA_NASCIMENTO`, `TELEFONE`, `RUA`, `NUMERO`, `BAIRRO`, `CIDADE`, `UF`) VALUES
(1, 2147483647, 429193829, 'BRUNO LAZARO', '1997-04-29', '12982271118', 'CARLINHOS AGUIA', 1289, 'JARDIM LEITAO', 'SÃO JOSÉ DOS CAMPOS', 'SP'),
(2, 2147483647, 429223829, 'LEONARDO TAMANHAO', '1997-04-29', '12982272218', 'CARLINHOS DA SILVA', 1200, 'JARDIM ORIENTE', 'CAÇAPAVA', 'SP'),
(3, 2147483647, 429223829, 'ANDRESSA FLÁVIA', '1997-04-29', '12982272211', 'BRABA DA SILVA', 111, 'JARDIM SATELITE', 'TAUBATÉ', 'SP'),
(4, 2147483647, 222222222, 'ROBERTINHOO', '2020-10-03', '129822279588', 'Oswaldo de Pinto Guimarães', 0, 'Jardim Cachaça', 'SAO JOSE DOS CAMPOS', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `ID_TURMA` varchar(4) NOT NULL,
  `ID_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`ID_TURMA`, `ID_CURSO`) VALUES
('BDDA', 2),
('BDDB', 2),
('BDDC', 2),
('REDA', 3),
('REDB', 3),
('LOGA', 4),
('LOGB', 4),
('ENGA', 9),
('ROBA', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disc_profe`
--

CREATE TABLE `turma_disc_profe` (
  `ID_TURMA_DISC_PROFE` int(11) NOT NULL,
  `ID_TURMA` varchar(4) NOT NULL,
  `ID_DISCIPLINA` int(11) NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma_disc_profe`
--

INSERT INTO `turma_disc_profe` (`ID_TURMA_DISC_PROFE`, `ID_TURMA`, `ID_DISCIPLINA`, `ID_PROFESSOR`) VALUES
(13, 'BDDA', 7, 2),
(14, 'BDDA', 9, 3),
(15, 'BDDA', 10, 3),
(16, 'BDDA', 8, 3),
(17, 'BDDC', 6, 2),
(18, 'BDDC', 7, 2),
(19, 'BDDC', 15, 4),
(20, 'BDDC', 8, 1),
(21, 'BDDC', 9, 3),
(22, 'BDDC', 10, 4),
(24, 'ENGA', 17, 4),
(28, 'BDDA', 15, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD KEY `FK_ALUNOSTURMA` (`ID_TURMA`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_CURSO`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`ID_DISCIPLINA`),
  ADD KEY `FK_DISCIPLINASTURMAS` (`ID_CURSO`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID_PROFESSOR`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`ID_TURMA`),
  ADD KEY `FK_TURMASCURSOS` (`ID_CURSO`);

--
-- Índices para tabela `turma_disc_profe`
--
ALTER TABLE `turma_disc_profe`
  ADD PRIMARY KEY (`ID_TURMA_DISC_PROFE`),
  ADD KEY `FK_TURMA_DISC_PROF` (`ID_TURMA`),
  ADD KEY `FK_TURMA_DISC_PROFE_2` (`ID_DISCIPLINA`),
  ADD KEY `FK_TURMA_DISC_PROFE_3` (`ID_PROFESSOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `ID_DISCIPLINA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `turma_disc_profe`
--
ALTER TABLE `turma_disc_profe`
  MODIFY `ID_TURMA_DISC_PROFE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `FK_ALUNOSTURMA` FOREIGN KEY (`ID_TURMA`) REFERENCES `turmas` (`ID_TURMA`);

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `FK_DISCIPLINASTURMAS` FOREIGN KEY (`ID_CURSO`) REFERENCES `cursos` (`ID_CURSO`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `FK_TURMASCURSOS` FOREIGN KEY (`ID_CURSO`) REFERENCES `cursos` (`ID_CURSO`);

--
-- Limitadores para a tabela `turma_disc_profe`
--
ALTER TABLE `turma_disc_profe`
  ADD CONSTRAINT `FK_TURMA_DISC_PROF` FOREIGN KEY (`ID_TURMA`) REFERENCES `turmas` (`ID_TURMA`),
  ADD CONSTRAINT `FK_TURMA_DISC_PROFE_2` FOREIGN KEY (`ID_DISCIPLINA`) REFERENCES `disciplinas` (`ID_DISCIPLINA`),
  ADD CONSTRAINT `FK_TURMA_DISC_PROFE_3` FOREIGN KEY (`ID_PROFESSOR`) REFERENCES `professor` (`ID_PROFESSOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
