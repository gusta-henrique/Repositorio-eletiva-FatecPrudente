USE projeto_ecommerce;

-- ==============================
-- TABELA: users (apenas admin)
-- ==============================
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('ADM') DEFAULT 'ADM',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ==============================
-- TABELA: lojas
-- ==============================
CREATE TABLE lojas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    
    telefone VARCHAR(20) NULL,
    whatsapp VARCHAR(20) NOT NULL,
    email VARCHAR(255) NULL,
    
    endereco VARCHAR(255) NULL,
    cidade VARCHAR(100) NULL,
    estado VARCHAR(100) NULL,
    cep VARCHAR(20) NULL,
    
    horario_funcionamento VARCHAR(255) NULL,
    
    logo VARCHAR(255) NULL,
    
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ==============================
-- TABELA: categorias
-- ==============================
CREATE TABLE categorias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ==============================
-- TABELA: produtos
-- ==============================
CREATE TABLE produtos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255) NULL,
    
    loja_id BIGINT UNSIGNED NOT NULL,
    categoria_id BIGINT UNSIGNED NOT NULL,
    
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    CONSTRAINT fk_produtos_loja
        FOREIGN KEY (loja_id) REFERENCES lojas(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_produtos_categoria
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON DELETE CASCADE
);