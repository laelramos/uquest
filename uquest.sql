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
