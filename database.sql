-- ============================================================
-- EcoTech - Estrutura do banco de dados
-- Reconstruída a partir do diagrama DATABASEPPI_.PNG (2023)
-- Importe no phpMyAdmin ou: mysql -u root ppi < database.sql
-- ============================================================

CREATE DATABASE IF NOT EXISTS ppi
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ppi;

CREATE TABLE IF NOT EXISTS usuarios (
    id            INT(11)      NOT NULL AUTO_INCREMENT,
    nome_completo VARCHAR(100) NOT NULL,
    cpf           VARCHAR(14)  NOT NULL,
    telefone      VARCHAR(15)  NOT NULL,
    endereco      VARCHAR(255) NOT NULL,
    email         VARCHAR(100) NOT NULL,
    senha         VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS agendamentos (
    id                INT(11)     NOT NULL AUTO_INCREMENT,
    tipo_lixo         VARCHAR(50) NOT NULL,
    quantidade        INT(11)     NOT NULL,
    tamanho           VARCHAR(20) NOT NULL,
    data              DATE        NULL,
    instrucoes        TEXT        NULL,
    concordo_checkbox TINYINT(1)  NOT NULL,
    usuario_id        INT(11)     NULL,
    PRIMARY KEY (id),
    KEY fk_agendamentos_usuario (usuario_id),
    CONSTRAINT fk_agendamentos_usuario
        FOREIGN KEY (usuario_id) REFERENCES usuarios (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
