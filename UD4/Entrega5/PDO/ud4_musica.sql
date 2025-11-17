-- Create database (if needed) and select it
CREATE DATABASE IF NOT EXISTS dwes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dwes;


-- Recreate table
DROP TABLE IF EXISTS ud4_musica;
CREATE TABLE ud4_musica (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  artist VARCHAR(100) NOT NULL,
  genre VARCHAR(50),
  release_year YEAR,
  duration TIME,                 -- song duration
  unit_price DECIMAL(5,2) DEFAULT 0.00,
  quantity_in_stock INT UNSIGNED DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Sample data
INSERT INTO ud4_musica (title, artist, genre, release_year, duration, unit_price, quantity_in_stock)
VALUES
('Bohemian Rhapsody', 'Queen', 'Rock', 1975, '00:05:55', 1.29, 15),
('Shape of You', 'Ed Sheeran', 'Pop', 2017, '00:03:53', 0.99, 20),
('Billie Jean', 'Michael Jackson', 'Pop', 1982, '00:04:54', 1.19, 12),
('Smells Like Teen Spirit', 'Nirvana', 'Grunge', 1991, '00:05:01', 1.09, 10),
('Imagine', 'John Lennon', 'Rock', 1971, '00:03:07', 0.89, 25);