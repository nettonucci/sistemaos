-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/11/2018 às 03:39
-- Versão do servidor: 10.1.36-MariaDB
-- Versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `caixa`
--

CREATE TABLE `caixa` (
  `iid` int(11) NOT NULL,
  `ospgto` int(11) DEFAULT NULL,
  `clientepgto` varchar(65) COLLATE utf8_bin NOT NULL,
  `eqppgto` varchar(65) COLLATE utf8_bin NOT NULL,
  `valpgto` varchar(20) COLLATE utf8_bin NOT NULL,
  `mtdpgto` varchar(65) COLLATE utf8_bin NOT NULL,
  `formpgto` varchar(10) COLLATE utf8_bin NOT NULL,
  `dataentrada` date NOT NULL,
  `tipopgtoo` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(65) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(65) NOT NULL,
  `cidade` varchar(65) NOT NULL,
  `estado` varchar(65) NOT NULL,
  `datacad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `descricao` varchar(65) NOT NULL,
  `precocompra` float NOT NULL,
  `precovenda` float NOT NULL,
  `quantidade` int(10) NOT NULL,
  `datacad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `for_pgto`
--

CREATE TABLE `for_pgto` (
  `id` int(11) NOT NULL,
  `tipopgto` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `for_pgto`
--

INSERT INTO `for_pgto` (`id`, `tipopgto`) VALUES
(1, 'Dinheiro'),
(2, 'Cartao de credito'),
(3, 'Cartao de debito'),
(4, 'Boleto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `maoobra`
--

CREATE TABLE `maoobra` (
  `id` int(11) NOT NULL,
  `servico` varchar(65) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `idos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `os`
--

CREATE TABLE `os` (
  `idos` int(11) NOT NULL,
  `idcliente` varchar(65) CHARACTER SET latin1 NOT NULL,
  `status` varchar(65) COLLATE utf8_bin NOT NULL,
  `dataentrada` date NOT NULL,
  `tipoeqp` varchar(65) CHARACTER SET latin1 NOT NULL,
  `modelo` varchar(65) CHARACTER SET latin1 NOT NULL,
  `serial` varchar(65) CHARACTER SET latin1 NOT NULL,
  `datasaida` date DEFAULT NULL,
  `defeito` varchar(100) CHARACTER SET latin1 NOT NULL,
  `obs` varchar(600) CHARACTER SET latin1 NOT NULL,
  `laudo` varchar(600) CHARACTER SET latin1 DEFAULT NULL,
  `idproduto` varchar(65) CHARACTER SET latin1 DEFAULT NULL,
  `qtdproduto` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `totalos` float NOT NULL,
  `final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ospeca`
--

CREATE TABLE `ospeca` (
  `idd` int(11) NOT NULL,
  `idpeca` int(11) NOT NULL,
  `quantidadeos` int(11) NOT NULL,
  `idos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `descricaosta` varchar(65) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `status`
--

INSERT INTO `status` (`id`, `descricaosta`) VALUES
(1, 'Aguardando avaliação do tecnico'),
(2, 'Diagnostico em andamento'),
(3, 'Aguardando aprovação de orçamento'),
(4, 'Aguardando peça'),
(5, 'Reparo em andamento'),
(6, 'Pronto, aguardando cliente'),
(7, 'Equipamento entregue');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(65) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(65) COLLATE utf8_bin NOT NULL,
  `senha` varchar(65) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(2, 'ADM', 'admin', 'admin'),
(5, 'Netto Nucci', 'netto', 'nucci');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idv` int(11) NOT NULL,
  `cliente` varchar(65) COLLATE utf8_bin NOT NULL,
  `descricaov` varchar(65) COLLATE utf8_bin NOT NULL,
  `valor` float NOT NULL,
  `datavenda` date NOT NULL,
  `tipovenda` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`iid`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `for_pgto`
--
ALTER TABLE `for_pgto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `maoobra`
--
ALTER TABLE `maoobra`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idos`);

--
-- Índices de tabela `ospeca`
--
ALTER TABLE `ospeca`
  ADD PRIMARY KEY (`idd`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idv`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `for_pgto`
--
ALTER TABLE `for_pgto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `maoobra`
--
ALTER TABLE `maoobra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ospeca`
--
ALTER TABLE `ospeca`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
