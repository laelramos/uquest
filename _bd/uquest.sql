SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `uquest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `uquest`;

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(80) NOT NULL,
  `desc_disciplina` varchar(500) DEFAULT NULL,
  `path_disciplina` varchar(30) DEFAULT NULL,
  `IsDeleted` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `functions` (
  `idFunction` int(11) NOT NULL,
  `nameFunction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `questoes` (
  `id_questao` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `tipo_questao` int(11) NOT NULL,
  `enunciado_questao` varchar(4000) NOT NULL,
  `img_questao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `questoes_alternativas` (
  `id_alternativa` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `texto_alternativa` varchar(500) NOT NULL,
  `correta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `questoes_tipo` (
  `id_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Function` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CreationDate` datetime DEFAULT current_timestamp(),
  `LastLogin` datetime DEFAULT NULL,
  `AccountStatus` varchar(50) DEFAULT 'Ativo',
  `Role` varchar(50) DEFAULT 'Usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user_tokens` (
  `TokenID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`);

ALTER TABLE `functions`
  ADD PRIMARY KEY (`idFunction`);

ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id_questao`),
  ADD KEY `id_disciplina` (`id_disciplina`),
  ADD KEY `tipo_questao` (`tipo_questao`);

ALTER TABLE `questoes_alternativas`
  ADD PRIMARY KEY (`id_alternativa`),
  ADD KEY `id_questao` (`id_questao`);

ALTER TABLE `questoes_tipo`
  ADD PRIMARY KEY (`id_tipo`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`TokenID`),
  ADD KEY `UserID` (`UserID`);


ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `functions`
  MODIFY `idFunction` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questoes`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questoes_alternativas`
  MODIFY `id_alternativa` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questoes_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `questoes`
  ADD CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplina`),
  ADD CONSTRAINT `questoes_ibfk_2` FOREIGN KEY (`tipo_questao`) REFERENCES `questoes_tipo` (`id_tipo`);

ALTER TABLE `questoes_alternativas`
  ADD CONSTRAINT `questoes_alternativas_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `questoes` (`id_questao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




INSERT INTO `disciplinas` (`id_disciplina`, `nome_disciplina`, `desc_disciplina`, `path_disciplina`, `IsDeleted`) VALUES
(1, 'Segurança em Tecnologia da Informação', NULL, 'dsc_666bc497d72b7.png', NULL),
(9, 'Experiência Profissional: Carreira e Sucesso', '', NULL, NULL);

INSERT INTO `questoes` (`id_questao`, `id_disciplina`, `tipo_questao`, `enunciado_questao`, `img_questao`) VALUES
(1, 1, 1, 'questao segurança 1', NULL),
(2, 1, 1, 'questao segurança 2', NULL),
(3, 1, 1, 'questao segurança 3', NULL),
(4, 1, 1, 'questao segurança 4', NULL),
(5, 9, 1, 'questao experiencia 1', NULL),
(6, 9, 1, 'questao experiencia 2', NULL),
(7, 9, 1, 'questao experiencia 3', NULL),
(8, 9, 1, 'questao experiencia 4', NULL);

INSERT INTO `questoes_alternativas` (`id_alternativa`, `id_questao`, `texto_alternativa`, `correta`) VALUES
(1, 1, 'alternativa 1 questao segurança 1', 1),
(2, 1, 'alternativa 2 questao segurança 1', 0),
(3, 1, 'alternativa 3 questao segurança 1', 0),
(4, 1, 'alternativa 4 questao segurança 1', 0),
(5, 2, 'alternativa 1 questao segurança 2', 0),
(6, 2, 'alternativa 2 questao segurança 2', 0),
(7, 2, 'alternativa 3 questao segurança 2', 0),
(8, 2, 'alternativa 4 questao segurança 2', 1),
(9, 3, 'alternativa 1 questao segurança 3', 0),
(10, 3, 'alternativa 2 questao segurança 3', 1),
(11, 3, 'alternativa 3 questao segurança 3', 0),
(12, 3, 'alternativa 4 questao segurança 3', 0),
(13, 4, 'alternativa 1 questao segurança 4', 0),
(14, 4, 'alternativa 2 questao segurança 4', 0),
(15, 4, 'alternativa 3 questao segurança 4', 1),
(16, 4, 'alternativa 4 questao segurança 4', 0),
(17, 5, 'alternativa 1 questao experiencia 1', 1),
(18, 5, 'alternativa 2 questao experiencia 1', 0),
(19, 5, 'alternativa 3 questao experiencia 1', 0),
(20, 5, 'alternativa 4 questao experiencia 1', 0),
(21, 6, 'alternativa 1 questao experiencia 2', 0),
(22, 6, 'alternativa 2 questao experiencia 2', 1),
(23, 6, 'alternativa 3 questao experiencia 2', 0),
(24, 6, 'alternativa 4 questao experiencia 2', 0),
(25, 7, 'alternativa 1 questao experiencia 3', 0),
(26, 7, 'alternativa 2 questao experiencia 3', 0),
(27, 7, 'alternativa 3 questao experiencia 3', 1),
(28, 7, 'alternativa 4 questao experiencia 3', 0),
(29, 8, 'alternativa 1 questao experiencia 4', 0),
(30, 8, 'alternativa 2 questao experiencia 4', 0),
(31, 8, 'alternativa 3 questao experiencia 4', 0),
(32, 8, 'alternativa 4 questao experiencia 4', 1);

INSERT INTO `questoes_tipo` (`id_tipo`, `nome_tipo`) VALUES
(1, 'Objetiva'),
(2, 'Discursiva');

INSERT INTO `users` (`UserID`, `Username`, `Function`, `Password`, `Email`, `CreationDate`, `LastLogin`, `AccountStatus`, `Role`) VALUES
(23, 'admin', 0, '$2y$10$P8XtyCm4nQF8FnRwnUdn4.NmdgaoAIsf1r76fJDP1On7nWIBvXyn2', 'admin@admin.com', '2024-06-13 22:10:03', '2024-06-13 22:10:12', 'Ativo', 'Usuário');

INSERT INTO `user_tokens` (`TokenID`, `UserID`, `Token`, `Expiration`) VALUES
(0, 23, 'a4daae98b4d52d326bd8fe70e3df23aabff95db3ac66d6ec5999416e61c8263c8c16950a2ea95caf880124ee38cca28dfb54ce771b8dd975a44eb5c27e3a4cd0', '2024-08-13 03:10:12');