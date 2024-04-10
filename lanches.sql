-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Abr-2024 às 12:57
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
-- Banco de dados: `crud_grupolanche`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanches`
--

CREATE TABLE `lanches` (
  `id_lanche` int(11) NOT NULL,
  `nome_lanche` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `ingredientes` longtext NOT NULL,
  `img_lanche` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `lanches`
--

INSERT INTO `lanches` (`id_lanche`, `nome_lanche`, `preco`, `ingredientes`, `img_lanche`, `quantidade`) VALUES
(12, 'lanche3', 39, '     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel.     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.', 'pexels-pixabay-270557.jpg', 1000),
(14, 'lanche 1', 25, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.Lorem ipsum dolor sit amet consectetur adipisicing e', 'pexels-pixabay-270557.jpg', 5),
(15, 'lanche 2', 35, '     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel.     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.', 'icons8-código-64.png', 10),
(16, 'lanche4', 39, '     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel.     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.', 'pexels-pixabay-270557.jpg', 10),
(17, 'lanche5', 45, '     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia quis autem ullam dignissimos labore cupiditate asperiores officiis sapiente minima? Exercitationem, repellendus voluptates harum doloribus beatae nulla assumenda consequatur vel.     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, adipisci. Id soluta praesentium amet assumenda. Pariatur quod odit minima alias repudiandae maiores quam, ducimus voluptates nostrum blanditiis nihil quae perspiciatis.', 'icons8-usuário-homem-com-círculo-96.png', 15);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lanches`
--
ALTER TABLE `lanches`
  ADD PRIMARY KEY (`id_lanche`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lanches`
--
ALTER TABLE `lanches`
  MODIFY `id_lanche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
