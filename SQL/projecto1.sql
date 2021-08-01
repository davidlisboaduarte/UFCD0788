-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Mar-2021 às 19:19
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projecto1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `ID` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Apelido` text NOT NULL,
  `Email` text NOT NULL,
  `Mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`ID`, `Nome`, `Apelido`, `Email`, `Mensagem`) VALUES
(10, 'José ', 'Rodrigues', 'js@mail.pt', 'AAAA'),
(11, 'Luis', 'Rodrigues', 'luisrod@mail.pt', 'AAA'),
(19, 'Francisco', 'Cerqueira', 'francerqueira@mail.com', 'teste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste testeteste teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `ID` int(11) NOT NULL,
  `UFC` text NOT NULL,
  `UFCD` text NOT NULL,
  `Horas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`ID`, `UFC`, `UFCD`, `Horas`) VALUES
(32, '0754', 'PROCESSADOR DE TEXTO', '50'),
(33, '0769', 'ARQUITETURA INTERNA DO COMPUTADOR', '25'),
(34, '0770', 'DISPOSITIVOS E PERIFÉRICOS', '25'),
(35, '0771', 'CONEXÕES DE REDE', '25'),
(36, '0772', 'SISTEMAS OPERATIVOS - INSTALAÇÃO E CONFIGURAÇÃO', '25'),
(37, '0779', 'UTILITÁRIO DE APRESENTAÇÃO GRÁFICA', '25'),
(38, '0792', 'CRIAÇÃO DE PÁGINAS PARA A WEB EM HIPERTEXTO', '25'),
(39, '0793', 'SCRIPTS CGI E FOLHAS DE ESTILO', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos`
--

CREATE TABLE `trabalhos` (
  `ID` int(11) NOT NULL,
  `IDUFC` int(11) NOT NULL,
  `Trabalho` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `trabalhos`
--

INSERT INTO `trabalhos` (`ID`, `IDUFC`, `Trabalho`) VALUES
(56, 32, 'Dactilografar'),
(57, 32, 'Formatação de texto'),
(58, 32, 'Cópia de formatação'),
(59, 32, 'Recriação de Capa'),
(60, 33, 'Conversão entre números binários, decimais, octais e hexadecimais'),
(61, 33, 'Arquitetura de Von Neumann'),
(62, 33, 'Arquitetura interna do computador'),
(63, 34, 'Lei de Ohm'),
(64, 34, 'Montagem e desmontagem de um computador'),
(65, 34, 'Simulação de compra de um computador por componentes'),
(66, 35, 'Ficha avaliativa sobre conexões de rede'),
(67, 36, 'Instalação de Máquinas Virtuais'),
(68, 36, 'Funcionalidades do Windows'),
(69, 37, 'Trabalho em Powerpoint'),
(70, 38, 'Página estática em HTML'),
(71, 38, 'Página estática em HTML 2'),
(72, 39, 'Exercício prático de páginas em HTML e CSS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `trabalhos` (`IDUFC`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD CONSTRAINT `trabalhos_ibfk_1` FOREIGN KEY (`IDUFC`) REFERENCES `disciplinas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
