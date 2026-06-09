-- Crear base de datos (si no existe) y usarla
CREATE DATABASE IF NOT EXISTS dwes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dwes;


-- Crear tabla solicitada
DROP TABLE IF EXISTS ud4_empresa;
CREATE TABLE ud4_empresa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  cargo  VARCHAR(50),
  salario DECIMAL(10,2) DEFAULT 0.00,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- (Opcional) Datos de ejemplo
INSERT INTO ud4_empresa (nombre, cargo, salario) VALUES
('Ana López', 'Desarrolladora', 1800.50),
('Luis Pérez', 'Técnico Soporte', 1400.00);