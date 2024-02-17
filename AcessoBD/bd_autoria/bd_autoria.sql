-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2023 às 15:11
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
create DATABASE `bd_autoria`;
use `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `cod_autor` int(11) NOT NULL,
  `nome_autor` varchar(15) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`cod_autor`, `nome_autor`, `sobrenome`, `email`, `nasc`) VALUES
(1, 'Machado ', 'de Assis', 'assismachado@yahoo.com', '1839-06-21'),
(2, 'John ', 'Tolkien', 'tolkienrings@gmail.com', '1892-01-03'),
(3, 'Andrzej ', 'Sapkowski', 'geralt.rivia@gmail.com', '1948-07-21'),
(4, 'Jeff', 'Kinney', 'jeffk@outlook.com', '1960-02-08'),
(5, 'Marlon', 'Marques da Silva', 'marlon.marques@etec.sp.gov.br', '1983-12-31'),
(6, ' George', ' Orwell ', 'george.orwell@gmail.com', '1940-09-23'),
(7, 'Junji', 'Ito', 'terror.assombracao@yahoo.com.br', '1970-09-20'),
(9, 'Susane ', 'Collins', 'collin@gmail.com', '1910-05-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `cod_autor` int(11) NOT NULL,
  `cod_livro` int(11) NOT NULL,
  `data_lancamento` date NOT NULL,
  `editora` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`cod_autor`, `cod_livro`, `data_lancamento`, `editora`) VALUES
(5, 1, '2020-10-03', 'Independente'),
(7, 2, '2020-05-08', 'Independente'),
(3, 5, '1990-10-02', 'WorldCat'),
(4, 3, '1990-10-03', 'VREditora'),
(5, 2, '2020-09-08', 'Independente'),
(9, 8, '2010-01-12', 'LucasBooks');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `cod_livro` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `ISBN` varchar(17) NOT NULL,
  `idioma` varchar(40) NOT NULL,
  `qtde_paginas` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`cod_livro`, `titulo`, `categoria`, `ISBN`, `idioma`, `qtde_paginas`) VALUES
(1, 'Por Que O Brasil Elegeu Bolsonaro?', 'Filosofia', '978-65-8999-01-3', 'Portugês', 150),
(2, 'Espíritos De Fato Existem?', 'Filosofia', '998-65-8559-01-8', 'Português', 150),
(3, 'Diário De Um Banana', 'Comédia', '498-95-8519-01-8', 'Português', 200),
(4, 'Harry Potter', 'Fantasia', '678-35-9539-03-1', 'Português', 264),
(5, 'The Witcher: O Último Desejo', 'Medieval', '588-95-9779-53-8', 'Polonês', 300),
(7, 'A cantiga dos passaros e das serpentes', 'Romance', '128-63-6136-13-1', 'Inglês', 800);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(50) NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`) VALUES
('a', 123),
('b', 456);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`cod_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
