CREATE DATABASE IF NOT EXISTS `projeto-p1`;
USE `projeto-p1`;

-- 1. Tabela de Categorias (Deve ser criada primeiro por causa da FK)
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Tabela de Produtos (Com chave estrangeira para categorias)
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `preco` DECIMAL(10,2) NOT NULL,
  `estoque` INT DEFAULT 0,
  `categoria_id` BIGINT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_produtos_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `lojas` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `cnpj` VARCHAR(20) UNIQUE,
  `endereco` VARCHAR(255),
  `telefone` VARCHAR(20),
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela principal do carrinho (vinculada ao usuário)
CREATE TABLE IF NOT EXISTS `carrinhos` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `status` ENUM('aberto', 'finalizado', 'abandonado') DEFAULT 'aberto',
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_carrinho_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabela de itens do carrinho (os produtos)
CREATE TABLE IF NOT EXISTS `carrinho_itens` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `carrinho_id` BIGINT UNSIGNED NOT NULL,
  `produto_id` BIGINT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL DEFAULT 1,
  `preco_unitario` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_itens_carrinho` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_itens_produto` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;


INSERT INTO categorias (nome, descricao, created_at, updated_at) 
VALUES 
('Garrafas', 'Stanley, Kouda e marcas esportivas', NOW(), NOW()),
('Mochilas', 'Kipling, Jansport e modelos executivos', NOW(), NOW()),
('Malas', 'Malas de viagem Kipling e outras marcas', NOW(), NOW()),
('Canetas', 'Modelos Masculinos, Femininos e de Luxo', NOW(), NOW()),
('Cadernos', 'Caderno inteligente e planners', NOW(), NOW());