-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2021 às 01:06
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvcblog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NULL DEFAULT NULL,
  `visitas` int(11) NOT NULL DEFAULT 0,
  `data_ultima_visita` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `url`, `titulo`, `texto`, `criado_em`, `atualizado_em`, `visitas`, `data_ultima_visita`) VALUES
(1, 'noticias', 'Notícias', 'Notícias em geral do mundo da tecnologia', '2020-08-16 18:43:06', NULL, 0, NULL),
(2, 'categoria-1', 'categoria 1', 'texto da categoria 1', '2020-08-16 18:43:06', '2020-09-07 20:43:24', 2, '2020-09-08 01:21:51'),
(3, 'categoria-3', 'Categoria 3', 'texto da categoria 3', '2020-08-17 12:23:54', NULL, 0, NULL),
(8, 'dicas-e-tutoriais', 'Dicas e Tutoriais', 'Dicas e Tutoriais de Tecnologia', '2020-08-21 20:21:06', NULL, 2, '2020-09-07 20:11:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `capa` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NULL DEFAULT NULL,
  `visitas` int(11) NOT NULL DEFAULT 0,
  `data_ultima_visita` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `categoria_id`, `url`, `capa`, `titulo`, `texto`, `criado_em`, `atualizado_em`, `visitas`, `data_ultima_visita`) VALUES
(1, 3, 8, 'what-is-lorem-ipsum', 'https://arquivo.devmedia.com.br/marketing/img/artigo-introducao-ao-padrao-mvc-29308.png', 'What is Lorem Ipsum?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the <b><font color=\"#9c00ff\">1500s</font></b>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the <b><font color=\"#397b21\">1960s</font></b> with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2020-01-10 20:36:21', NULL, 0, NULL),
(2, 1, 3, 'where-does-it-come-from', 'https://miro.medium.com/max/6084/1*iWS1FXC2s98r37HTQRayFw.png', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2020-06-15 20:37:22', NULL, 1, '2021-01-07 21:43:11'),
(3, 3, 1, 'why-do-we-use-it', 'https://arquivo.devmedia.com.br/cursos/imagem/curso_preparando-o-ambiente-para-programar-em-php_2057.png', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-06-15 20:37:53', NULL, 0, NULL),
(4, 1, 1, 'where-can-i-get-some', 'https://www.isbrasil.info/blog/_images/blog/destaques/2017/06/19/performance-e-velocidade-no-php7-vale-apena-migrar_eb989fad492464e6ddafd794c8a6027d.jpg', 'Where can I get some?', '<p>There are many variations of passages of Lorem Ipsum available,<b> but the majority have suffered alteration in some form</b>, by injected humour, or &nbsp;words which don\'t look even slightly believable.</p>', '2020-06-15 20:39:08', '2021-01-07 23:47:36', 5, '2021-01-07 23:27:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `biografia` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `avatar`, `nome`, `email`, `senha`, `biografia`, `facebook`, `youtube`, `instagram`, `criado_em`, `level`) VALUES
(1, 'https://img2.gratispng.com/20181206/gec/kisspng-computer-icons-user-profile-portable-network-graph-go-to-image-page-5c08b9d570aa08.2752372515440757334615.jpg', 'Ronaldo Aires', 'ceo@unset.com.br', '$2y$10$l74j7lcv.0JTuuZoZuC71uT..XqOaSxnda1M8dFed8RXyPhI/647u', 'Formado em Tecnologia em Sistemas para Internet pela IFMT.  Pós Graduado como Especialista em Docência em Ciência e Tecnologia da Informação pela FCV', 'https://www.facebook.com/unset.com.br', 'https://www.youtube.com/c/unset', NULL, '2020-05-22 17:08:40', 3),
(2, NULL, 'Fiona', 'teste2@teste.com', '$2y$10$0W8VdFyOmiXd3eFvyndgg.dj9nSbnttGvJYW29VcfU4TOrbM1cSfi', NULL, NULL, NULL, NULL, '2020-05-27 19:44:58', 0),
(3, NULL, 'Tia Leila', 'teste3@teste.com', '$2y$10$rj8q/ZcUD3dnGALuIxDuHuTKsYlL0B6uE4iOYH/mtm8AyPBUdN0yO', NULL, NULL, NULL, NULL, '2020-05-28 18:09:25', 0),
(4, NULL, 'João e Maria', 'teste@te.com', '$2y$10$QUMBjIAHeJ1AMFk8FtHvMegUVa6iwm/oS2undLEywo1WQXXuBXuS6', NULL, NULL, NULL, NULL, '2020-08-25 19:48:19', 0),
(5, NULL, 'gustavo', 'gustavow3dev@gmail.com', '$2y$10$Qi0XcQWx/Ukh7eU2aTUgOOyFYi86sv9Q17KiuetUjuecfieIDu35y', NULL, NULL, NULL, NULL, '2021-01-07 22:11:47', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
