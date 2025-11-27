-- Arquivo: banco_transporte.sql
-- Nome do BD: sistema_transportes

-- Criação do Banco de Dados
CREATE SCHEMA IF NOT EXISTS `sistema_transportes` DEFAULT CHARACTER SET utf8;
USE `sistema_transportes`;

-- 1. Tabela USUARIO (Para manter o login e cadastro)
CREATE TABLE IF NOT EXISTS `sistema_transportes`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- 2. Tabela LINHA (RF1: CRUD Linhas)
CREATE TABLE IF NOT EXISTS `sistema_transportes`.`linha` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `horario_saida` TIME NOT NULL,
  `horario_chegada` TIME NOT NULL,
  `cidade_origem` VARCHAR(100) NOT NULL,
  `cidade_destino` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- 3. Tabela PASSAGEIRO (RF2: CRUD Passageiros)
CREATE TABLE IF NOT EXISTS `sistema_transportes`.`passageiro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(14) UNIQUE NOT NULL,
  `email` VARCHAR(255),
  `telefone` VARCHAR(20),
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- 4. Tabela ESTACAO (RF3: CRUD Estações de Saída)
CREATE TABLE IF NOT EXISTS `sistema_transportes`.`estacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- 5. Tabela VIAGEM (RF4: Registrar Viagens - Relação N:N:N)
CREATE TABLE IF NOT EXISTS `sistema_transportes`.`viagem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `linha_id` INT NOT NULL,
  `passageiro_id` INT NOT NULL,
  `estacao_id` INT NOT NULL,
  `data_viagem` DATE NOT NULL,
  `registro_hora` TIME NOT NULL, -- Hora exata do registro/embarque
  PRIMARY KEY (`id`),
  INDEX `fk_viagem_linha_idx` (`linha_id` ASC),
  INDEX `fk_viagem_passageiro_idx` (`passageiro_id` ASC),
  INDEX `fk_viagem_estacao_idx` (`estacao_id` ASC),
  CONSTRAINT `fk_viagem_linha`
    FOREIGN KEY (`linha_id`)
    REFERENCES `sistema_transportes`.`linha` (`id`),
  CONSTRAINT `fk_viagem_passageiro`
    FOREIGN KEY (`passageiro_id`)
    REFERENCES `sistema_transportes`.`passageiro` (`id`),
  CONSTRAINT `fk_viagem_estacao`
    FOREIGN KEY (`estacao_id`)
    REFERENCES `sistema_transportes`.`estacao` (`id`)
) ENGINE = InnoDB;