CREATE DATABASE sca2;

USE sca2;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- usuário padrão
INSERT INTO usuarios (nome, email, senha)
VALUES (
    'Admin',
    'admin@sca2.com',
    MD5('123456')
);