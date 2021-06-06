create table usuario(
  id int(11) auto_increment primary key,
  name varchar(30) not null,
  email varchar(50) not null,
  lastName varchar(50) not null,
  phone varchar(20) not null,
  cep varchar(20) not null,
  password varchar(55) NOT NULL,
  cpassword varchar(55) NOT NULL,
  complement int(11) not null,
  homeAddress varchar(30) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2021 at 07:08 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `alarme`
--
-- --------------------------------------------------------
--
-- Table structure for table `usuario`
--
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET armscii8 NOT NULL,
  `sobrenome` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(11) CHARACTER SET armscii8 NOT NULL,
  `senha` varchar(55) CHARACTER SET armscii8 NOT NULL,
  `csenha` varchar(55) CHARACTER SET armscii8 NOT NULL,
  `cep` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `rua` varchar(30) CHARACTER SET armscii8 NOT NULL,
  `tipo` char(8) CHARACTER SET armscii8 NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Indexes for dumped tables
--
--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;